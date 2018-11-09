<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('price');
            $table->string('description');
            $table->date('service_date');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_services');
    }
}
