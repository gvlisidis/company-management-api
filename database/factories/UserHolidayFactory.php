<?php

namespace Database\Factories;

use App\Models\UserHoliday;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserHolidayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserHoliday::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'start_date' => $this->faker->date('Y-m-d', now()->addDays(3)),
            'start_date_period' => 'am',
            'end_date' => $this->faker->date('Y-m-d', now()->addDays(5)),
            'end_date_period' => 'am',
            'reason' => '',
        ];
    }
}
