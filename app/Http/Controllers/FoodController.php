<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Food;

class FoodController extends Controller
{
    public $gProt;
    public $gCarb;
    public $gFat;

    public $protCal;
    public $carbCal;
    public $fatCal;
    public $totalCal;

    /**
     * Calculate the total grams of Protein, Carbs, and Fat.
     *
     * @return \Illuminate\Http\Response
     */
    public static function totalGrams($p, $c, $f) 
    {
        $this->gProt += $p;
        $this->$gCarb += $c;
        $this->$gFat += $f;
        return calcCalories($gProt, $gCarb, $gFat);
    }
    /**
     * Calculate the total calories.
     *
     * @return \Illuminate\Http\Response
     */

    public static function calcCalories($p, $c, $f) 
    {
        $protCal += ($p * 4);
        $carbCal += ($c * 4);
        $fatCal += ($f * 9);
        $totalCal += ($protCal + $carbCal + $fatCal);
        return $totalCal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meal $meal)
    {
        $food               = new Food($request->all());    // Create a new Food obj
        $food->Food_Name    = $request->Food_Name;  // The $request->Food_Name is from oneMeal.blade.php's form's 'Food name' input
        $food->meal_id      = $meal->id;

        $meal->foods()->save($food);     // Sets meal hasMany foods relationship and then saves it in the db

        request()->session()->flash( 'status',  // Calls the Bootstrap pop-up alert containing success msg
            sprintf( 'Created new food: %s',    // %s = string
                $food->Food_Name)
        );

        return redirect()->action( 'MealController@show',
            $meal->id       // Food created successfully, so now let's display it
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
