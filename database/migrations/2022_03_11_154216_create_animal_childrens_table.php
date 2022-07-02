<?php

use App\Models\Animals\Animal;
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
        Schema::create('animal_children', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Animal::class, 'animal_id')->constrained();
            $table->string('name')->nullable();
            $table->jsonb('details')->nullable();
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
        Schema::dropIfExists('animal_children');
    }
};
