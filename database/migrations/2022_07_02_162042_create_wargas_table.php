<?php

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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique()->nullable();
            $table->string('nama_warga')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('no_kk')->unique()->nullable();
            $table->text('alamat')->nullable();
            $table->jsonb('detail_alamat')->nullable();
            $table->string('no_telp')->unique()->nullable();
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'buddha'])->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            $table->string('pekerjaan')->nullable();
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
        Schema::dropIfExists('wargas');
    }
};
