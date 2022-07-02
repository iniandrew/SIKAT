<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('password'),
            'jabatan_id' => Jabatan::SUPER_ADMIN
        ]);

        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'jabatan_id' => Jabatan::ADMIN
        ]);

        User::query()->create([
            'name' => 'Bendahara',
            'email' => 'bendahara@mail.com',
            'password' => bcrypt('password'),
            'jabatan_id' => Jabatan::BENDAHARA
        ]);

        User::query()->create([
            'name' => 'Warga',
            'email' => 'warga@mail.com',
            'password' => bcrypt('password'),
            'jabatan_id' => Jabatan::WARGA
        ]);
    }
}
