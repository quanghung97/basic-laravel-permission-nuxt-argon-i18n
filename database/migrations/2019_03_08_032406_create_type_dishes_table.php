<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeDishesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('type_dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('type_dishes');
    }
}
