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
        Schema::create('booking_cars', function (Blueprint $table) {
            $table->id();
            $table->string('name_car');
            $table->string('user_name');
            $table->string('email');
            $table->string('name_comp');
            $table->string('model');
            $table->integer('price');
            $table->integer('stayDuration');
            $table->integer('num_Booking');
            $table->bigInteger('allpr');
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
        Schema::dropIfExists('booking_cars');
    }
};
