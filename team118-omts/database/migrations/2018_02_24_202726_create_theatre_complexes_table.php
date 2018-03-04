<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatreComplexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatre_complexes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone_num');
            $table->string('street_num');
            $table->string('street_name');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('postal_code');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theatre_complexes');
    }
}
