<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'assign roles']);

        Permission::create(['name' => 'approve holiday']);
        Permission::create(['name' => 'reject holiday']);
        Permission::create(['name' => 'create holiday']);

        Permission::create(['name' => 'request holiday']);
        Permission::create(['name' => 'edit holiday']);
        Permission::create(['name' => 'delete holiday']);

        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $permissions = Permission::pluck('id')->toArray();

        $superAdmin->syncPermissions($permissions);
        $admin->syncPermissions([5,6,7,8,9,10]);
        $userRole->syncPermissions([8,9,10]);

        $users = User::all();

        foreach ($users as $user){
            if($user->id == 1){
                $user->assignRole($superAdmin, $admin, $userRole);
            } elseif ($user->id == 2){
                $user->assignRole($admin, $userRole);
            } else {
                $user->assignRole($userRole);
            }
        }
    }
}
