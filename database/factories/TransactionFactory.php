<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessResult;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount'=>fake()->numberBetween(1,100000),
            'user_id' => Client::inRandomOrder()->first()->id,
            'type' =>fake()->randomElement(['d','c']),
            'description' =>"Pneu x",
        ];
    }
}
