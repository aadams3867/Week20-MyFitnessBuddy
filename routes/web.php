<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/meals/create', function () {
	return view('addMeal');
});

Route::get('/meals/{id}', function ($id) {
	return view('oneMeal');
});

Route::get('/meals', function () {
	return view('allTheMeals');
});