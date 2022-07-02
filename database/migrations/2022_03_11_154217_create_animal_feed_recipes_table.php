<?php

use App\Models\AnimalFeed;
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
        Schema::create('animal_feed_recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AnimalFeed::class, 'animal_feed_id')->constrained();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('animal_feed_recipes');
    }
};
