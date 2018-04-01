<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->integer('theatre_complex_id')->unsigned();
            $table->foreign('theatre_complex_id')->references('id')->on('theatre_complexes')->onDelete('cascade');
            $table->unique(['movie_id', 'theatre_complex_id']);
            // $table->primary(['movie_id', 'theatre_complex_id'], 'movie_theatre_complex_id')->onDelete('cascade');
            $table->date('run_start_date');
            $table->date('run_end_date');
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
        Schema::dropIfExists('run_dates');
    }
}
