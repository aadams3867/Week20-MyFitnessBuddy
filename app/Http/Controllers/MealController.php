<?php

namespace App\Http\Controllers;

use App\Meal;
use App\User;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/meals/allTheMeals', 
            ['meal' => Meal::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/meals/addMeal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $meal               = new Meal($request->all());    // Create a new Meal obj
        $meal->Meal_Name    = $request->Meal_Name;  // The $request->Meal_Name is from addMeal.blade.php's form's 'Meal name' input
        $meal->save();                              // Saves this new obj data in the db

        $user->meals();         // Sets user hasMany meals relationship
        $user->save($meal);     // Saves relationship info in the db

        request()->session()->flash( 'status',  // Calls the Bootstrap pop-up alert containing success msg
            sprintf( 'Created new meal: %s',    // %s = string
                $meal->Meal_Name)
        );

        return redirect()->action( 'MealsController@show',
            $meal->id       // Meal created successfully, so now let's display it
            //['id' => $data->id]
            //['meal' => Meal::find( $id )]
        );
        // return redirect()->route( 'layouts.app' );
        // return redirect()->route( 'meals.show', $task->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/meals/oneMeal',
            ['meal' => Meal::find( $id )]
        );
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
