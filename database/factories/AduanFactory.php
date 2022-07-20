<?php

namespace Database\Factories;

use App\Models\Aduan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aduan>
 */
class AduanFactory extends Factory
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
            'judul_aduan' => $this->faker->text(50),
            'isi_aduan' => $this->faker->sentence(100),
            'status_aduan' => $this->faker->randomElement([Aduan::STATUS_NEED_REVIEW, Aduan::STATUS_REJECTED, Aduan::STATUS_APPROVED]),
        ];
    }
}
