@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">All the Meals</div>
                </div>
                <div class="panel-body">
                    <a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a> to get started.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection