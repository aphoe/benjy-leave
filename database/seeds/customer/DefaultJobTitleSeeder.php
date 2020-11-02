<?php

use Illuminate\Database\Seeder;

class DefaultJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = new \App\Customers\Models\JobTitle();
        $title->code = 'SADM';
        $title->name = 'System Admin';
        $title->description = config('project.appNameShort')  . ' system admin';
        $title->save();
    }
}
