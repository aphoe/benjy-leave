<?php

use App\Customers\Models\Permission;
use App\Customers\Models\PermissionDefinition;
use App\Traits\CustomerRoles;
use Illuminate\Database\Seeder;

class PermissionLeaveSeeder extends Seeder
{
    use CustomerRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permSuper = Permission::create(['name' => 'leave-super-admin']);
        $permAdmin = Permission::create(['name' => 'leave-admin']);
        $permView = Permission::create(['name' => 'leave-view']);

        PermissionDefinition::create([
            'permission_id' => $permSuper->id,
            'permission_name' => 'Leave super admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PermissionDefinition::create([
            'permission_id' => $permAdmin->id,
            'permission_name' => 'Leave administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PermissionDefinition::create([
            'permission_id' => $permView->id,
            'permission_name' => 'Leave viewer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Add permissions to roles
        $permSuper->assignRole([$this->manager]);
        $permAdmin->assignRole([$this->staff]);
        $permView->assignRole([$this->finance, $this->admin]);
    }
}
