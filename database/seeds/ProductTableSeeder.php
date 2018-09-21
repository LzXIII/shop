<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
          'product'=>str_random(10),
          'price'=>12,
        ]);
        DB::table('products')->insert([
          'product'=>str_random(10),
          'price'=>12,
        ]);
    }
}
