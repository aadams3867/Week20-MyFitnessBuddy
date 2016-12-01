<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MealsTableSeeder::class);
        factory(App\Meal::class, 5)->create();

        $this->call(FoodsTableSeeder::class);
        factory(App\Food::class, 5)->create();
    }
}
