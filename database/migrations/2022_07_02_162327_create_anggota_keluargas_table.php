<?php

use App\Models\Warga;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Warga::class, 'warga_id')->constrained();
            $table->string('nik_anggota')->unique()->nullable();
            $table->string('nama_anggota')->nullable();
            $table->string('tanggal_lahir_anggota')->nullable();
            $table->string('tempat_lahir_anggota')->nullable();
            $table->string('pekerjaan_anggota')->nullable();
            $table->enum('jenis_kelamin_anggota', ['pria', 'wanita'])->nullable();
            $table->enum('agama_anggota', ['islam', 'kristen', 'katolik', 'hindu', 'buddha'])->nullable();
            $table->string('status_hubungan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_keluargas');
    }
};
