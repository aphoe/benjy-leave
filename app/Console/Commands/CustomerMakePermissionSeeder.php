<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomerMakePermissionSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:make:permission-seeder {name : Name of the seeder file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a Permission seeder for customers';

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

        $this->call('make:seeder', [
            'name' => 'customer\Permission' . $name . 'Seeder',
        ]);
    }
}
