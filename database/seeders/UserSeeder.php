<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'George',
            'email' => 'gv@mail.com',
        ]);

        User::factory()->create([
            'name' => 'Zina',
            'email' => 'zs@mail.com',
        ]);

        User::factory()->create([
            'name' => 'Kleio',
            'email' => 'kl@mail.com',
        ]);

        User::factory()->create([
            'name' => 'Anestis',
            'email' => 'an@mail.com',
        ]);

        User::factory()->create([
            'name' => 'Soula',
            'email' => 'sl@mail.com',
        ]);
    }
}
