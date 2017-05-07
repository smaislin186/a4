@extends('layouts.master')

@section('title')
    ProfitPoint:Home
@endsection

@section('content')
    <div class="content">
        <h2>Profit Point</h2>
        <div class="intro">
        Scrabble Calculator will help you validate and score your scrabble
            words so you can get back to the game faster! 
            <br>
            <a href='/results' class='dimAction'>RESULTS<i class='fa fa-pencil'></i></a>
            <a href='/showCenter' class='dimAction'>Manage Centers<i class='fa fa-pencil'></i></a>
            <a href='/showProduct' class='dimAction'>Manage Products<i class='fa fa-pencil'></i></a>
            <a href='/showIncomeData' class='dimAction'>Manage Input Data<i class='fa fa-pencil'></i></a>
        </div>

        <div id="center-chart"></div>
        <?=Lava::render('ColumnChart', 'Center Profit', 'center-chart')?>

        <div id="product-chart"></div>
        <?=Lava::render('ColumnChart', 'Product Profit', 'product-chart')?>
    </div>
@endsection