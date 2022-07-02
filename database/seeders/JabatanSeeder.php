<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Bendahara',
            'Warga'
        ];

        foreach ($roles as $role) {
            Jabatan::query()->create([
                'nama_jabatan' => $role
            ]);
        }
    }
}
