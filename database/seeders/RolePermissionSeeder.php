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

            [
                'group_name' => 'dasbhboard',
                'permissions' =>[
                    // Dashboard Permission
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' =>[
                    // Blogs permissons
                    'blog.view',
                    'blog.create',
                    'blog.delete',
                    'blog.edit',
                    'blog.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' =>[
                    // Admin permissons
                    'admin.approve',
                    'admin.view',
                    'admin.create',
                    'admin.delete',
                    'admin.edit',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' =>[
              // Role permissons

                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' =>[
                    // Profile permissons
                    'profile.view',
                    'profile.edit'
                ]
            ],




        ];

        // Create and Assign Permission
        //
        for ($i=0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];
            for($j=0; $j< count($permissions[$i]['permissions']); $j++){
                // Create Permission
                $permission = Permission::create(['name'=>$permissions[$i]['permissions'][$j], 'group_name'=> $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }

        }

    }
}
