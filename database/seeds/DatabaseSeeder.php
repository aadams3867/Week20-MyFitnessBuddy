<?php
date_default_timezone_set('America/New_York');
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
        //factory(App\meals::class, 5)->create();
    }
}
