<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Account;

class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'type' => Account::ACCOUNT_TYPE_CREDIT,
            'amount' => $this->faker->randomDigit(4),
            'remark' => $this->faker->sentence

        ];
    }
}
