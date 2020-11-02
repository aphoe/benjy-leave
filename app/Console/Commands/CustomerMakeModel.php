<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CustomerMakeModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:make:model {name : Name of the class} {--m|migration : Create a migration file as well}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model into the customers models folder';

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
        $migration = $this->option('migration');

        $pre = 'App\Customers\Models\\';

        $this->call('make:model', [
            'name' => $pre .$name,
        ]);

        if($migration){
            $this->makeMigration($name);
        }
    }

    private function makeMigration(string $name): void
    {
        $table = Str::snake(Str::pluralStudly(class_basename($name)));
        $path = 'database\migrations\customer';

        $this->call('make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--path' => $path,
        ]);
    }
}
