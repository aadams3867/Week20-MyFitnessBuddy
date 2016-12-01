@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Add Another Meal</div>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="{{ url('/meals/store') }}">
                    {{ csrf_field() }}
                    <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon2">Name</span>
                      <input type="text" class="form-control" placeholder="Meal name" aria-describedby="sizing-addon2"
                            name="Food_Name"
                            id="Food_Name"
                            value="@yield('Food_Name')">

                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Submit</button>
                      </span>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection