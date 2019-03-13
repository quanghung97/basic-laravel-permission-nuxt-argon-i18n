<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->integer('price');
            $table->string('link_image', 191)->nullable();
            $table->timestamps();
            $table->integer('type_dish_id')->unsigned();
            $table->foreign('type_dish_id')
                ->references('id')
                ->on('type_dishes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
