<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            //Create Roles
            $roleSuperAdmin = Role::create(['name' => 'superadmin']);
            $roleAdmin = Role::create(['name' => 'admin']);
            $roleEditor = Role::create(['name' => 'editor']);
            $roleViewer = Role::create(['name' => 'viewer']);

            //Permission List As Array
            $permissions = [
                //Dashbaord

                //admin Permissions
                'admin.create',
                'admin.view',
                'admin.edit',
                'admin.delete',
                'admin.approve',
                //Role Permissions
                'role.create',
                'role.view',
                'role.edit',
                'role.delete',
                'role.approve',
                //Profile Permissions
                'profile.create',
                'profile.view',
                'profile.edit',
                'profile.delete',
                'profile.approve',
            ];
            // Create and Assign Permissions
            //
            for ($i = 0; $i < count($permissions); $i++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
