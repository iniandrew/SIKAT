<?php

namespace Database\Seeders;

use App\Models\Aduan;
use App\Models\Agenda;
use App\Models\Dana;
use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(JabatanSeeder::class);
        $this->call(UserSeeder::class);
        Agenda::factory(50)->create();
        Aduan::factory(50)->create();
        Dana::factory(50)->create();
        Warga::factory(50)->create();
    }
}
