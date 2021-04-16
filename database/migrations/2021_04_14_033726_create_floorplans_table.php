<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floorplans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('bathCabinets');
            $table->integer('interiorDoors');
            $table->integer('kitchenCabinets');
            $table->integer('lights');
            $table->string('plan')->unique();
            $table->integer('sinks');
            $table->integer('sqft');
            $table->integer('toilets');
            $table->integer('tubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floorplans');
    }
}
