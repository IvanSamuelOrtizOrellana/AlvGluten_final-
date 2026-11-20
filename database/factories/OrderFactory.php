<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'total' => 0,
            'status' => fake()->randomElement([
                'pendiente',
                'confirmado',
                'enviado',
                'entregado',
            ]),
        ];
    }
}