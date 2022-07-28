<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      =>  $this->faker->name,
            'principal' =>  $this->faker->randomNumber(7),
            'interest'  =>  $this->faker->randomNumber(3),
            'tenure'    =>  $this->faker->randomNumber(2)
        ];
    }
}
