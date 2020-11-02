<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTenancyMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:make:migration {migration : The name of the migration }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration file into the tenant migrations folder';

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
        $migration = $this->argument('migration');
        //$path = config('tenancy.db.tenant-migrations-path');
        $path = 'database\migrations\customer';

        $this->call('make:migration', [
            'name' => $migration,
            '--path' => $path,
        ]);
    }
}
