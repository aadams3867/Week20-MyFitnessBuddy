<?php

use Carbon\Carbon;
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
	        'Meal_Name' => str_random(10),
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
    	]);
    }
}
