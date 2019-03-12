<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationHasServicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('location_has_services', function (Blueprint $table) {
            $table->integer('location_id')->unsigned();
            $table->integer('type_service_id')->unsigned();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreign('type_service_id')
                ->references('id')
                ->on('type_services')
                ->onDelete('cascade');

            $table->primary(['location_id', 'type_service_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('location_has_services');
    }
}
