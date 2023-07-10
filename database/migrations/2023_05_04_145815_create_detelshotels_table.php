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
        Schema::create('detelshotels', function (Blueprint $table) {
            $table->id();
            $table->string('numRoom');
            $table->string('contentHotel');
            $table->bigInteger('floor');
            $table->bigInteger('price');
            $table->bigInteger('numofroom');
            $table->bigInteger('numFmaily');
            $table->bigInteger('catgory');
            $table->unsignedBigInteger('rooms_id');
            $table->foreign('rooms_id')->references('id')->on('addhotels')->cascadeOnDelete();
            $table->string('typeroom')->nullable();
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
        Schema::dropIfExists('detelshotels');
    }
};
