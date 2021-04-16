<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('capexbudget');
            $table->integer('numberofunits');
            $table->integer('numofbuildings');
            $table->string('purchaseprice');
            $table->string('renovationPercentage');
            $table->integer('year');
            $table->json('amenities')->nullable();
            $table->json('amenities2')->nullable();
            $table->json('customBathPlan')->nullable();
            $table->json('customBuildingPlan')->nullable();
            $table->json('customKitchenPlan')->nullable();
            $table->json('floorplans')->nullable();
            $table->json('globalTiles')->nullable();
            $table->json('miscelaneous')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
