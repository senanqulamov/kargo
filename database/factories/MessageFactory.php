<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'service' => $this->faker->sentence($nbWords = 20, $variableNbWords = true) ,
            'subject' => $this->faker->text(20),
            'message' => $this->faker->text(200),
            'status' => $this->faker->randomElement(['1', '2']),
            'created_at' => $this->faker->dateTimeBetween('-5 day' )
        ];
    }
}
