<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatreComplexAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatre_complex_addresses', function (Blueprint $table) {
            $table->integer('theatre_complex_id')->unsigned();
            $table->foreign('theatre_complex_id')
                  ->references('id')->on('theatre_complexes')
                  ->onDelete('cascade');
            $table->string('apt_num');
            $table->string('street_num');
            $table->string('street_name');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theatre_complex_addresses');
    }
}
