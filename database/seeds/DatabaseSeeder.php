<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserOneSeeder::class);
        $this->call(PlanLiteSeeder::class);
        $this->call(PlanPlusSeeder::class);
        $this->call(PlanPremiumSeeder::class);
        $this->call(RavePlanTableSeeder::class);
    }
}
