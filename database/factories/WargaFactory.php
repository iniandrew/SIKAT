<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->unique()->creditCardNumber,
            'nama_warga' => $this->faker->name,
            'tanggal_lahir' => $this->faker->date(),
            'tempat_lahir' => $this->faker->city,
            'status_perkawinan' => $this->faker->randomElement(['Belum Kawin', 'Kawin']),
            'no_kk' => $this->faker->unique()->creditCardNumber,
            'alamat' => $this->faker->address,
            'no_telp' => $this->faker->phoneNumber,
            'agama' => $this->faker->randomElement(['islam', 'kristen', 'hindu', 'buddha']),
            'jenis_kelamin' => $this->faker->randomElement(['pria', 'wanita']),
            'pekerjaan' => $this->faker->jobTitle,
            'status_hubungan' => $this->faker->randomElement(['Kepala Keluarga', 'Anak', 'Istri', 'Suami', 'Ayah', 'Ibu']),
        ];
    }
}
