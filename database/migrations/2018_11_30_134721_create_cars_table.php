<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate_number');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->string('fuel_type');
            $table->string('motor');
            $table->string('injection_type');
            $table->string('motor_code');
            $table->string('car_body');
            $table->integer('roles_id')->unsigned();
            $table->foreign('roles_id')->references('id')->on('roles');
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
        Schema::dropIfExists('cars');
    }
}
