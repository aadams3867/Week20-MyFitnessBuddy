@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <div class="meal-title"><h2>{{ $meal->Meal_Name }}</h2>
            <?php echo date("l, M d, Y", strtotime($meal->created_at)) ?>
        </div>
        <?php
            $totalCal = 0;
            $protCal = 0;
            $carbCal = 0;
            $fatCal = 0;
        ?>
        <span class="meal-data label label-pill label-primary">{{ $totalCal }} Cal</span>
        <span class="meal-data label label-pill label-default">{{ $protCal }}g Protein</span>
        <span class="meal-data label label-pill label-default">{{ $carbCal }}g Carbohydrates</span>
        <span class="meal-data label label-pill label-default">{{ $fatCal }}g Fat</span>
    </div>
    <hr>
    <div id="allfoods">
        <h3>Foods - Protein (g) : Carbohydrates (g): Fat (g)</h3>
        <ul class="list-food">
            <?php
            use App\Http\Controllers\FoodController;
            
            // Query the db for Foods associated with this Meal id
            $listOfFoods = DB::table('foods')->where('meal_id', $meal->id)->get();
            $foodFound = false;  // No foods associated

            // Loop through each Food associated with this Meal id
            foreach ($listOfFoods as $food) {
                ?><li class="list-food-item">{{ $food->Food_Name }} - {{ $food->Protein }} : {{ $food->Carbohydrates }} : {{ $food->Fat }}</li><?php
                $foodFound = true;  // Food(s) associated!

                FoodController::totalGrams($food->Protein, $food->Carbohydrates, $food->Fat);
            }

            // If no Foods were found
            if ($foodFound == false) {
                echo "No Foods associated with this meal.  Add some below.";
            }
            ?>
        </ul>
    </div>
    <hr>
    <div id="addFood">
      <form class="form-horizontal" role="form" method="POST" action="/meals/{{ $meal->id }}/foods">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="Food_Name" class="col-sm-2 form-control-label">Food name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Food name"
                        name="Food_Name"
                        id="Food_Name"
                        value="@yield('Food_Name')" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="Protein" class="col-sm-2 form-control-label">Protein</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Protein (g)"
                        name="Protein"
                        id="Protein"
                        value="@yield('Protein')" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Carbohydrates" class="col-sm-2 form-control-label">Carbohydrates</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Carbohydrates (g)"
                        name="Carbohydrates"
                        id="Carbohydrates"
                        value="@yield('Carbohydrates')" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Fat" class="col-sm-2 form-control-label">Fat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Fat (g)"
                        name="Fat"
                        id="Fat"
                        value="@yield('Fat')" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default" type="submit">Submit</button>
            </div>
        </div>   
      </form>
    </div>
</div>
@endsection