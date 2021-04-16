<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiscellaneousplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscellaneousplans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('cost');
            $table->string('info')->nullable();
            $table->string('name')->unique();
            $table->json('photos')->nullable();
            $table->string('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miscellaneousplans');
    }
}
