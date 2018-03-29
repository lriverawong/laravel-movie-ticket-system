<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // 0 = admin
            // 1 = regular user
            $table->integer('role')->default(1);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->string('address');
            $table->string('phone_num');
            $table->string('credit_card_num')->default("");
            $table->string('credit_card_exp')->default("");
            $table->string('apt_num');
            $table->string('street_num');
            $table->string('street_name');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('postal_code');
            // $table->string('user_priv');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
