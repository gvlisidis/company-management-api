<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        User::factory()->create(
            [
                'name' => 'George',
                'email' => 'gv@mail.com',
                'role_id' => 1,
                'email_verified_at' => null,
            ]
        );
    }
}
