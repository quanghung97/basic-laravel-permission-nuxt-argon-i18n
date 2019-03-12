<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuHasDishesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menu_has_dishes', function (Blueprint $table) {
            $table->integer('dish_id')->unsigned();
            $table->integer('menu_id')->unsigned();

            $table->foreign('dish_id')
                ->references('id')
                ->on('dishes')
                ->onDelete('cascade');

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            $table->primary(['dish_id', 'menu_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('menu_has_dishes');
    }
}
