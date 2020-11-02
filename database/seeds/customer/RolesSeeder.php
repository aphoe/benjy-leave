<?php

use App\Customers\Models\Role;
use App\Customers\Models\RoleDefinition;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'role_name' => 'System Administrator',
                'editable_permissions' => false,
                'description' => 'Super user of the app. Has all rights and privileges.',
            ],
            [
                'name' => 'manager',
                'role_name' => 'HR Manager',
                'editable_permissions' => true,
                'description' => 'Managerial staff and/or head of the Human Resource Unit for this app',
            ],
            [
                'name' => 'staff',
                'role_name' => 'HR Staff',
                'editable_permissions' => true,
                'description' => 'Staff member and user role of the Human Resource Unit',
            ],
            [
                'name' => 'finance',
                'role_name' => 'Finance Staff',
                'editable_permissions' => true,
                'description' => 'Functional user with finance responsibilities',
            ],
            [
                'name' => 'user',
                'role_name' => 'User',
                'editable_permissions' => true,
                'description' => 'A user of the app, usually a member of staff of the company',
            ],
        ];

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        foreach ($roles as $role){
            $r = Role::create(['name' => $role['name']]);

            $def = new RoleDefinition();
            $def->role_id = $r->id;
            $def->role_name = $role['role_name'];
            $def->description = $role['description'];
            $def->editable_permissions = $role['editable_permissions'];
            $def->save();
        }
    }
}
