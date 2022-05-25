<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Role
        $roleSuperAdmin = Role::create(['name'=>'superadmin']);
        $roleAdmin = Role::create(['name'=>'admin']);
        $roleEditor = Role::create(['name'=>'editor']);
        $roleUser = Role::create(['name'=>'user']);

        // permission list as array
        $permissions = [
            // Dashboard Permission
            'dashboard.view',
            // Blogs permissons
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',
             // Admin permissons
             'admin.create',
             'admin.view',
             'admin.edit',
             'admin.delete',
             'admin.approve',
              // Role permissons
              'role.view',
              'role.edit',
              'role.delete',
              'role.approve',
              'role.create',

             // Profile permissons
             'profile.view',
             'profile.edit'

        ];

        // Create and Assign Permission
        //
        for ($i=0; $i < count($permissions); $i++) {
            // Create Permission
           $permission = Permission::create(['name'=>$permissions[$i]]);
           $roleSuperAdmin->givePermissionTo($permission);
           $permission->assignRole($roleSuperAdmin);
        }

    }
}
