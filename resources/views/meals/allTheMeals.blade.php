@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <div class="page-title"><h2>All the Meals</h2></div>
    </div>
    <hr>
    <div class="page-body">
        <div id="allmeals">
            <ul class="list-meals">
                <?php  
                // Query the db for all the Meals associated with this User id
                $listOfMeals = DB::table('meals')->where('user_id', Auth::user()->id)->get();

                // Loop through each Meal associated with this User id
                foreach ($listOfMeals as $meal) {
                    ?><li class="list-meal-item">{{ $meal->Meal_Name }} - 
                    <?php echo date("g:ma", strtotime($meal->created_at)) . " on " .
                        date("l, M d, Y", strtotime($meal->created_at)) ?>
                    </li><?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
@endsection