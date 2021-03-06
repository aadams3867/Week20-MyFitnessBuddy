<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Meal::class, function (Faker\Generator $faker) {
    return [
        'Meal_Name' => $faker->word,
        'created_at' => $faker->dateTime($max = 'now'),
        'updated_at' => $faker->dateTime($max = 'now')                         
    ];
});

$factory->define(App\Food::class, function (Faker\Generator $faker) {
    return [
        'Food_Name' => $faker->word,
        'Protein' => $faker->numberBetween(0, 50),
        'Carbohydrates' => $faker->numberBetween(0, 50),
        'Fat' => $faker->numberBetween(0, 50),
        'created_at' => $faker->dateTime($max = 'now'),
        'updated_at' => $faker->dateTime($max = 'now')                         
    ];
});