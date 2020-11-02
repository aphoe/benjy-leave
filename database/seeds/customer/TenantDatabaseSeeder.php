<?php

use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);

        $this->call(EmploymentTypesTableSeeder::class);
        $this->call(DefaultJobTitleSeeder::class);
        $this->call(LeaveTypeSeeder::class);

        //Permissions
        $this->call(PermissionStaffManagementSeeder::class);
        $this->call(PermissionCustomerSettingsSeeder::class);
        $this->call(PermissionSmsSeeder::class);
        $this->call(PermissionLeaveSeeder::class);
        $this->call(PermissionHolidaySeeder::class);
    }
}
