<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialModels extends Migration
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
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('value')->nullable();
        });


        Schema::create('schemas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });


        Schema::create('pivot_properties', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id');
            $table->string('component_type');
            $table->unsignedBigInteger('component_id');

            $table->foreign('property_id')->references('id')->on('properties');

        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_properties');
        Schema::dropIfExists('schemas');
        Schema::dropIfExists('properties');


    }
}
