<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement(['Shipping Costs', 'Our services','ship lounge offers','we are who', 'Our Advantages']),
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->sentence(),
        ];
    }
}
