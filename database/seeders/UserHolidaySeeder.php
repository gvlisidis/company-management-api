<?php

namespace Database\Seeders;

use App\Models\UserHoliday;
use Illuminate\Database\Seeder;

class UserHolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserHoliday::factory()->create([
            'user_id' => 1,
            'start_date' => '2021-09-11',
            'start_date_period' => 'am',
            'end_date' => '2021-09-15',
            'end_date_period' => 'pm',
            'reason' => '',
        ]);

        UserHoliday::factory()->create([
            'user_id' => 1,
            'start_date' => '2021-11-12',
            'start_date_period' => 'am',
            'end_date' => '2021-11-25',
            'end_date_period' => 'pm',
            'reason' => '',
        ]);

        UserHoliday::factory()->create([
            'user_id' => 1,
            'start_date' => '2021-12-24',
            'start_date_period' => 'am',
            'end_date' => '2021-12-28',
            'end_date_period' => 'pm',
            'reason' => '',
        ]);

        UserHoliday::factory()->create([
            'user_id' => 1,
            'start_date' => '2021-05-28',
            'start_date_period' => 'am',
            'end_date' => '2021-06-04',
            'end_date_period' => 'pm',
            'reason' => '',
        ]);

        UserHoliday::factory()->create([
            'user_id' => 1,
            'start_date' => '2021-04-18',
            'start_date_period' => 'am',
            'end_date' => '2021-04-29',
            'end_date_period' => 'pm',
            'reason' => '',
        ]);

    }
}
