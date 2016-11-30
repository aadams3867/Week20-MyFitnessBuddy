<?php

use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('meals')->insert([
	        'Food Name' => str_random(10),
	        'Protein' =>  random_int(0, 50),
	        'Carbohydrates' =>  random_int(0, 50),
	        'Fat' =>  random_int(0, 50),
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    	]);
    }
}
