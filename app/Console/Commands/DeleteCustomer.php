<?php

namespace App\Console\Commands;

use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Console\Command;

class DeleteCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:delete {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes a customer of the provided name. Only available on the local environment e.g. php artisan customer:delete boise';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // because this is a destructive command, we'll only allow to run this command
        // if you are on the local environment
        if (!app()->isLocal()) {
            $this->error('This command is only available on the local environment.');

            return;
        }

        $name = $this->argument('name');
        $this->deleteTenant($name);
    }

    private function deleteTenant($name)
    {
        try {
            if ($hostname = Hostname::where('fqdn', $name)->with(['website'])->firstOrFail()) {
                $website = $hostname->website;

                //Delete public folder
                customerDeletePublicFolder($website);

                //Delete details
                app(HostnameRepository::class)->delete($hostname, true);
                app(WebsiteRepository::class)->delete($website, true);

                $this->info("Tenant {$name} successfully deleted.");
            }
        } catch (\Exception $ex){
            $this->error('Error: ' . $ex->getMessage());
        }
    }
}
