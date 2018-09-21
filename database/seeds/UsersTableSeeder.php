<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Class UsersTableSeeder extends Seeder {

    public function run()
    {
      DB::table('users')->insert([
        'email'=>'johndoe@gmail.com',
        'password'=>Hash::make('password'),
        'name'=>'John Doe',
        'admin'=>0,
      ]);
      DB::table('users')->insert([
        'email'=>'frank@gmail.com',
        'password'=>Hash::make('adminpassword'),
        'name'=>'Frank',
        'admin'=>0,
      ]);

    }

}
