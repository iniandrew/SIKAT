<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dana>
 */
class DanaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 4),
            'kategori_dana' => $this->faker->randomElement(['Dana Masuk', 'Dana Keluar']),
            'tgl_transaksi' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'total' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
