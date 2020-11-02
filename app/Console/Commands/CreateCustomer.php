<?php

namespace App\Console\Commands;

use App\Customers\Models\User;
use App\Notifications\CustomerCreated;
use Carbon\Carbon;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:create {name} {email} {subDomain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a customer with the provided name, email address and sub-domain e.g. php artisan customer:create boise boise@example.com boise';

    private $subDomain;

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        $this->subDomain = $this->argument('subDomain');

        if ($this->customerExists()) {
            $this->error("A customer with name '{$name}' and/or '{$email}' already exists.");

            return;
        }

        $hostname = $this->registerCustomer();
        app(Environment::class)->hostname($hostname);

        // we'll create a random secure password for our to-be admin
        $password = str_random();
        //$password = 'qwerty';
        $this->addAdmin($name, $email, $password)
            ->notify(new CustomerCreated($hostname));

        $this->info("Customer '{$name}' is created and is now accessible at {$hostname->fqdn}");
        $this->info("Admin {$email} has been invited!");
    }

    /**
     * Check if customer already exists
     * @return bool
     */
    private function customerExists(): bool
    {
        //return Customer::where('name', $name)->orWhere('email', $email)->exists();
        return Hostname::where('fqdn', $this->fqdn())->exists();
    }

    /**
     * Register a customer
     * @return \Hyn\Tenancy\Contracts\Hostname|Hostname
     */
    private function registerCustomer(){
        //Create website
        $website = new Website;
        $website->managed_by_database_connection = 'system';
        app(WebsiteRepository::class)->create($website);

        //Create host name
        $hostname = new Hostname;
        $hostname->fqdn = $this->fqdn();
        $hostname = app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname, $website);

        //Switch to new customer
        $tenancy = app(Environment::class);
        $tenancy->hostname($hostname);
        $tenancy->tenant($website); // switches the customer and reconfigures the app

        return $hostname;
    }

    /**
     * Create admin user for customer
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    private function addAdmin($name, $email, $password)
    {
        $admin = User::create([
            'surname' => $name,
            'first_name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => Carbon::now(),
        ]);
        $admin->guard_name = 'web';
        $admin->assignRole('admin');

        return $admin;
    }

    /**
     * Construct FQDN ti be used by hostname
     * @return string
     */
    private function fqdn(){
        $baseUrl = config('project.baseUrl');
        return $this->subDomain . '.' . $baseUrl;
    }
}
