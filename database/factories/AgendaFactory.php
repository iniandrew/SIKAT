<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
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
            'judul_agenda' => $this->faker->text(50),
            'isi_agenda' => $this->faker->sentence(200),
            'tempat_agenda' => $this->faker->city,
            'status_agenda' => $this->faker->randomElement([Agenda::STATUS_PUBLISHED, Agenda::STATUS_DRAFT]),
        ];
    }
}
