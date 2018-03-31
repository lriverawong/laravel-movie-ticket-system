<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => 'tester1@gmail.com',
            'password' => bcrypt('password'),
            'phone_num' => str_random(10),
            'credit_card_num' => str_random(10),
            'credit_card_exp' => str_random(10),
            'apt_num' => str_random(10),
            'street_num' => str_random(10),
            'street_name' => str_random(10),
            'city' => str_random(10),
            'province' => str_random(10),
            'country' => str_random(10),
            'postal_code' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => 'tester2@gmail.com',
            'password' => bcrypt('password'),
            'phone_num' => str_random(10),
            'credit_card_num' => str_random(10),
            'credit_card_exp' => str_random(10),
            'apt_num' => str_random(10),
            'street_num' => str_random(10),
            'street_name' => str_random(10),
            'city' => str_random(10),
            'province' => str_random(10),
            'country' => str_random(10),
            'postal_code' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
