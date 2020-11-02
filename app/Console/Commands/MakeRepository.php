<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name : Name of the repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create eloquent model repository';

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
     * @return int
     */
    public function handle()
    {
        $path = app_path('Repositories');
        if(!is_dir($path)){
            mkdir($path);
        }

        $stub = 'Console/Commands/stubs/repository.stub';
        $stub = app_path(str_replace('/', DIRECTORY_SEPARATOR, $stub));

        if(file_exists($stub)){
            $content = file_get_contents($stub);
            $repo_class_name = studly_case($this->argument('name')) . 'Repository';
            $repo_name = $path . DIRECTORY_SEPARATOR . $repo_class_name . '.php';
            $content = str_replace('class_name', $repo_class_name, $content);

            if(file_put_contents($repo_name, $content )){
                $this->info($repo_class_name . ' has been created.');
            }else{
                $this->error('Could not create ' . $repo_class_name);
            }
        }else{
            $this->error('Repository stub does not exist.');
        }

        return 0;
    }
}
