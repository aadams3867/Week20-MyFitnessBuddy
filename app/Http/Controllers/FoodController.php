<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Meal;
use App\Food;
use App\Http\Controllers\FoodController;

class FoodController extends Controller
{
    public $listOfFoods;
    public $foodFound;
    public $arrayStats;

    public $gProt;
    public $gCarb;
    public $gFat;

    public $protCal;
    public $carbCal;
    public $fatCal;
    public $totalCal;

    /**
     * Calculate Meal stats for display on Meal.blade.php.
     *
     * @return \Illuminate\Http\Response
     */
    public static function calcStats($id) 
    {
        global $listOfFoods, $arrayStats, $foodFound;

        // Query the db for Foods associated with this Meal id
        $listOfFoods = DB::table('foods')->where('meal_id', $id)->get();

        // Loop through each Food associated with this Meal id
        // and calculate the Meal stats
        foreach ($listOfFoods as $food) {
            FoodController::totalGrams($food->Protein, $food->Carbohydrates, $food->Fat);
            FoodController::calcCalories();
            $arrayStats = FoodController::refreshStats();
        }

        // If there are no Foods associated with this Meal id yet...
        if ($arrayStats == NULL) {
            $arrayStats = FoodController::initStats();
        }
    }

    /**
     * Initialize stats.
     *
     * @return \Illuminate\Http\Response
     */
    public static function initStats() 
    {
        global $foodFound;
        $foodFound = false;
        return array(0, 0, 0, 0);
    }

    /**
     * Refresh stats.
     *
     * @return \Illuminate\Http\Response
     */
    public static function refreshStats() 
    {
        global $foodFound, $totalCal, $gProt, $gCarb, $gFat;
        $foodFound = true;  // Food(s) associated!
        return array($totalCal, $gProt, $gCarb, $gFat);
    }
    
    /**
     * Calculate the total grams of Protein, Carbs, and Fat.
     *
     * @return \Illuminate\Http\Response
     */
    public static function totalGrams($p, $c, $f) 
    {
        global $gProt, $gCarb, $gFat;

        $gProt += $p;
        $gCarb += $c;
        $gFat += $f;
    }

    /**
     * Calculate the total calories.
     *
     * @return \Illuminate\Http\Response
     */

    public static function calcCalories() 
    {
        global $gProt, $gCarb, $gFat,
        $protCal, $carbCal, $fatCal, $totalCal;

        $protCal = ($gProt * 4);  // 4 cal per g Protein
        $carbCal = ($gCarb * 4);  // 4 cal per g Carbohydrate
        $fatCal = ($gFat * 9);  // 9 cal per g Fat
        $totalCal = ($protCal + $carbCal + $fatCal);
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
        global $foodFound, $arrayStats;

        $food               = new Food($request->all());    // Create a new Food obj
        $food->Food_Name    = $request->Food_Name;  // The $request->Food_Name is from oneMeal.blade.php's form's 'Food name' input
        $food->meal_id      = $meal->id;

        $meal->foods()->save($food);     // Sets meal hasMany foods relationship and then saves it in the db

        request()->session()->flash( 'status',  // Calls the Bootstrap pop-up alert containing success msg
            sprintf( 'Created new food: %s',    // %s = string
                $food->Food_Name)
        );

        $foodFound = true;
        $arrayStats = FoodController::refreshStats();

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
