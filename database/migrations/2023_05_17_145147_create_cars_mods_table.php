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
        Schema::create('cars_mods', function (Blueprint $table) {
            $table->id();
            $table->string('name_car');
            $table->bigInteger('MAnfacturing_year');
            $table->text('Motion_vector')->nullable();
            $table->bigInteger('num_doors');
            $table->bigInteger('price_day');
            $table->string('Car_Model');
            $table->bigInteger('years');
            $table->bigInteger('drap');
            $table->string('luggage');
            $table->unsignedBigInteger('cars_id');
            $table->foreign('cars_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->string('contentcomp')->nullable();
            $table->string('catgory');
            $table->string('image')->nullable();
            $table->string('imgroomone')->nullable();
            $table->string('imgroomtow')->nullable();
            $table->string('imgroomthree')->nullable();
            $table->string('imgroomfour')->nullable();
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
        Schema::dropIfExists('cars_mods');
    }
};
