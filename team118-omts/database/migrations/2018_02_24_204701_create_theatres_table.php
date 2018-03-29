<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theatre_num');
            $table->integer('max_num_seats');
            $table->integer('screen_size');
            $table->integer('theatre_complex_id')->unsigned();
            $table->foreign('theatre_complex_id')
                  ->references('id')->on('theatre_complexes')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('theatres');
    }
}
