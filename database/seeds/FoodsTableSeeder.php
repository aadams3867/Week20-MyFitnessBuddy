<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('foods')->insert([
	        'Food_Name' => str_random(10),
	        'Protein' =>  random_int(0, 50),
	        'Carbohydrates' =>  random_int(0, 50),
	        'Fat' =>  random_int(0, 50),
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
    	]);
    }
}
