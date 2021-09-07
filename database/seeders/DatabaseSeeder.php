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

        User::factory()->create(
            [
                'name' => 'Zina',
                'email' => 'zs@mail.com',
                'role_id' => 1,
                'email_verified_at' => null,
            ]
        );

        User::factory()->create(
            [
                'name' => 'Kleio',
                'email' => 'kl@mail.com',
                'role_id' => 1,
                'email_verified_at' => null,
            ]
        );

        User::factory()->create(
            [
                'name' => 'Anestis',
                'email' => 'an@mail.com',
                'role_id' => 2,
                'email_verified_at' => null,
            ]
        );

        User::factory()->create(
            [
                'name' => 'Soula',
                'email' => 'sl@mail.com',
                'role_id' => 2,
                'email_verified_at' => null,
            ]
        );

        User::factory(15)->create([
            'role_id' => 2
        ]);

        Model::unguard();
        $this->call(UserHolidaySeeder::class);
        Model::reguard();
    }
}
