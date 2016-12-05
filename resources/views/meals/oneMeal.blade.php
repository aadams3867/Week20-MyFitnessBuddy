@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <div class="meal-title"><h2>{{ $meal->Meal_Name }}</h2>
            <?php echo date("l, M d, Y", strtotime($meal->created_at)) ?>
        </div>
    </div>
    <hr>
    <div id="allfoods">
        <h3>Foods</h3>
        <ul class="list-food">
            <?php
            $listOfFoods = DB::table('foods')->where('meal_id', $meal->id)->pluck('Food_Name');
            $foodFound = false;
            foreach ($listOfFoods as $food) {
                ?><li class="list-food-item">{{ $food }}</li><?php
                $foodFound = true;
            }
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
                <input type="text" class="form-control" placeholder="Protein"
                        name="Protein"
                        id="Protein"
                        value="@yield('Protein')" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Carbohydrates" class="col-sm-2 form-control-label">Carbohydrates</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Carbohydrates"
                        name="Carbohydrates"
                        id="Carbohydrates"
                        value="@yield('Carbohydrates')" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Fat" class="col-sm-2 form-control-label">Fat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Fat"
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