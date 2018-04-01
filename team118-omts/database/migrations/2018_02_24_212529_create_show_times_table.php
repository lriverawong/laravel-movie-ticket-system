<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theatre_id')->unsigned();
            $table->foreign('theatre_id')->references('id')->on('theatres')->onDelete('cascade');
            $table->dateTime('showing_start_time');
            $table->unsignedInteger('num_seats_avail');
            $table->integer('run_date_id')->unsigned();
            $table->foreign('run_date_id')->references('id')->on('run_dates')->onDelete('cascade');
            $table->unique(['theatre_id', 'showing_start_time', 'run_date_id'], 'showing_id');
            // $table->integer('movie_id')->unsigned();
            // $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            // $table->integer('theatre_complex_id')->unsigned();
            // $table->foreign('theatre_complex_id')->references('id')->on('theatre_complexes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('show_times');
    }
}
