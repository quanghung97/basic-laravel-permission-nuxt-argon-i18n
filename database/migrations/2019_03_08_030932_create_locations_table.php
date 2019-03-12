<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('address', 191);
            $table->integer('min_people');
            $table->integer('max_people');
            $table->string('link_image', 191)->nullable();
            $table->timestamps();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
