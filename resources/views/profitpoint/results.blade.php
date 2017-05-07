@extends('layouts.master')

@section('title')
    ProfitPoint:Results
@endsection

@section('content')
    <div class="content">
        <h2>Center and Product Profitability Results</h2>
        <br>
        @if(count($errors) > 0)
            <div class='alert alert-danger'>
            <ul>
                @foreach ($errors->get('center') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif 
        <form method ='POST' action='/results'>
            {{ csrf_field() }}
            <p>* Required fields</p>
            
            <label for='center'>Center to Graph</label>
            <select id='center' name='center'>
                <option value='0'>Choose</option>
                    <option value='All' {{ ($center == 'All') ? 'SELECTED' : '' }}>All</option>
                    <option value='East Boston' {{ ($center == 'East Boston') ? 'SELECTED' : '' }}>East Boston</option>
            </select> 
            @if($center == 'All')
                <button type='submit' class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-refresh"></span> 
                </button>
                <div id="center-chart"></div>
                <?=Lava::render('ColumnChart', 'Center Profit', 'center-chart')?>
            @elseif($center == 0 && $product!=null)
                <input type='submit' value='Retrieve Results' class='btn-primary btn small'>
            @endif

            <label for='product'>Product to Graph</label>
            <select id='product' name='product'>
                <option value='0'>Choose</option>
                    <option value='All' {{ ($product == 'All') ? 'SELECTED' : '' }}>All</option>
                    <option value='Loans' {{ ($product == 'Loans') ? 'SELECTED' : '' }}>Loans</option>
            </select> 

            @if($product == 'All')
                <button type='submit' class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-refresh"></span> 
                </button>
                <div id="product-chart"></div>
                <?=Lava::render('ColumnChart', 'Product Profit', 'product-chart')?>
            @endif
            
            <input type='submit' value='Retrieve Results' class='btn-primary btn small'>            
        </form>
    </div>
@endsection