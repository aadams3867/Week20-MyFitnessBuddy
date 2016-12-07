@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Welcome, {{ Auth::user()->name }}!</div>
                </div>

                <div class="panel-body">
                    <div id="allmeals">
                        
                        <?php

                        // Current date
                        $now = date("Y-m-d");

                        // Query the db for all the Meals associated with this User id for today
                        $listOfMeals = DB::table('meals')->where('user_id', Auth::user()->id)
                            ->whereDate('created_at', $now)->get();

                        // Check to see if any results were returned from the db
                        if (count($listOfMeals) == 0 ) { // No results!!
                            ?>Looks like you haven't eaten anything today.  <a href="{{ url('/meals/create') }}">You should change that.</a><?php
                        } else { // Found results!!
                            ?><p>Here's what you've eaten today:</p>
                            <ul class="list-meals"><?php
                                // Loop through each Meal associated with this User id
                                foreach ($listOfMeals as $meal) {
                                    ?><li class="list-meal-item"><a href="/meals/{{$meal->id}}">{{ $meal->Meal_Name }}</a> - 
                                    <?php echo date("g:ma", strtotime($meal->created_at))?>
                                    </li><?php
                                }
                                ?>
                            </ul>
                            <br>
                            <p>Why not <a href="{{ url('/meals/create') }}">keep track of your next meal</a>, too?</p>

                            <?php
                        }?>

                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection