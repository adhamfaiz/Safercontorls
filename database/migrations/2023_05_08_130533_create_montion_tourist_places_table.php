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
        Schema::create('montion_tourist_places', function (Blueprint $table) {
            $table->id();
            $table->string('name_TouristPlaces');
            $table->string('address');
            $table->text('description')->nullable();
            $table->string('types');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('montion_tourist_places');
    }
};
