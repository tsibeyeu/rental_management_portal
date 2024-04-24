<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       
            
            
        $adminRole= Role::create(['name' => 'admin']);
        $userRole= Role::create(['name' => 'user']);

        $permissions = [
            'create user',
            'update user',
            'delete user',
            'create room type',
            'update room type',
            'delete room type',
            'create room',
            'update room',
            'view tenant room',
            'delete room',
            'release room',
            'view room detail',
            'view room',
            'renting permission',
            'update tenant',
            'view tenant',
            'delete tenant'
            
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::create(['name' => $permissionName]);

            $adminRole->givePermissionTo($permission);

            if (in_array($permissionName, ['view_tenant', 'update_tenant', 'renting_permission', 'view_tenant_room', 'view_room', 'view_room_detail'])) {
                $userRole->givePermissionTo($permission);
            }

            // if ($permissionName === 'view tenant'|| $permissionName === 'update tenant' ||      $permissionName === 'renting permission' || $permissionName === 'view tenant room'|| $permissionName === 'view room' || $permissionName === 'view room detail') {
            //     $userRole->givePermissionTo($permission);
            // }
        }


    }
}
