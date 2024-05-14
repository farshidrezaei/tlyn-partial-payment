<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Enums\OrderTypeEnum;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'type' => $this->faker->randomElement(OrderTypeEnum::class),
            'status' => $this->faker->randomElement(OrderStatusEnum::class),
            'amount' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),

            'user_id' => User::factory(),
        ];
    }

    public function buy(): self
    {

        return $this->state(function () {
            return [
                'type' => OrderTypeEnum::BUY,
            ];
        });
    }

    public function sell(): self
    {

        return $this->state(function () {
            return [
                'type' => OrderTypeEnum::SELL,
            ];
        });
    }
}
