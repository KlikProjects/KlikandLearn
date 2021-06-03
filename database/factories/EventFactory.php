<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_time' => $this->faker->dateTime(),
            'title' => $this->faker->catchPhrase(),
            'image' => '',
            'users_max' => $this->faker->randomNumber($nbDigits = 2),
            'description' => $this->faker->text($maxNbChars = 200),
            'carousel' => false,
        ];
    }
}