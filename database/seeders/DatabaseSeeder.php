<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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


        Model::unguard();
        $this->call(UserSeeder::class);
        $this->call(UserHolidaySeeder::class);
        $this->call(RolePermissionSeeder::class);
        Model::reguard();
    }
}
