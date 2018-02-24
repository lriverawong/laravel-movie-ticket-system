<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_time', function (Blueprint $table) {
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->integer('theatre_id')->unsigned();
            $table->foreign('theatre_id')->references('id')->on('theatres')->onDelete('cascade');
            $table->integer('theatre_complex_id')->unsigned();
            $table->foreign('theatre_complex_id')->references('id')->on('theatre_complexes')->onDelete('cascade');
            $table->dateTime('showing_start_time');
            $table->primary(['movie_id', 'theatre_id', 'theatre_complex_id', 'showing_start_time'], 'showing_id');
            $table->unsignedInteger('num_seats_avail');
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
        Schema::dropIfExists('show_time');
    }
}
