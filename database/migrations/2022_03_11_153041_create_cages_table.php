<?php

use App\Models\Employee;
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
        Schema::create('cages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Employee::class, 'employee_id')->constrained();
            $table->text('location')->nullable();
            $table->string('capacity')->nullable();
            $table->enum('type', ['ground', 'sea'])->nullable();
            $table->jsonb('conditions')->nullable();
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
        Schema::dropIfExists('cages');
    }
};
