@extends('layouts.master')

@section('title')
    ProfitPoint:Home
@endsection

@section('content')
    <div class="content">
        <h2>Welcome to Scrabble Calculator</h2>
        <div class="intro">
        Scrabble Calculator will help you validate and score your scrabble
            words so you can get back to the game faster! 
            <br>
            <a href='/showCenter' class='dimAction'>Manage Centers<i class='fa fa-pencil'></i></a>
            <a href='/showProduct' class='dimAction'>Manage Products<i class='fa fa-pencil'></i></a>
            <a href='/showIncomeInput' class='dimAction'>Manage Input Data<i class='fa fa-pencil'></i></a>
        </div>
    </div>
@endsection