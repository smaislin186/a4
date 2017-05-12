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
                @foreach ($errors->get('centerHideEmpty') as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @foreach ($errors->get('productHideEmpty') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif 
        <form method ='POST' action='/results'>
            {{ csrf_field() }}
         
            {{-- If the form was submitted, display refresh button --}}
            @if($center != 'None' && $product != 'None')
                <div class= 'refreshButton'>
                    <button type='submit' class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-refresh"></span> 
                    </button>
                </div>
            @endif

            <p>
                <label for='center'>Center:</label>
                <select id='center' name='center'>
                    <option value='All' {{ ($center == 'All') ? 'SELECTED' : '' }}>All</option>
                    @foreach($centersForDropdown as $center_id=>$name)    
                        <option value='{{ $center_id }}' {{ ($center == $center_id) ? 'SELECTED' : '' }}>{{ $name }}</option>
                    @endforeach
                </select> 
            </p>
            <p>
                <input type='checkbox' name='centerHideEmpty' {{ ($centerHideEmpty) ? 'CHECKED' : '' }} >
                <label>only show centers with data</label>
            </p>
            
            {{-- If the form was submitted, display center graph --}}
            @if($center != 'None')
                <div id="center-chart"></div>
                <?=Lava::render('ColumnChart', 'Center Profit', 'center-chart')?>
            @endif
            
            <p>
                <label for='product'>Product:</label>
                <select id='product' name='product'>
                    <option value='All' {{ ($product == 'All') ? 'SELECTED' : '' }}>All</option>
                    @foreach($productsForDropdown as $product_id=>$name)    
                        <option value='{{ $product_id }}' {{ ($product == $product_id) ? 'SELECTED' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </p>
            <p> 
                <input type='checkbox' name='productHideEmpty' {{ ($productHideEmpty) ? 'CHECKED' : '' }} >
                <label>only show products with data</label>
            </p>

            {{-- If the form was submitted, display product graph --}}
            @if($product != 'None')
                <div id="product-chart"></div>
                <?=Lava::render('ColumnChart', 'Product Profit', 'product-chart')?>
            @endif
            
            @if($center == 'None' && $product == 'None')
                <p>
                    <input type='submit' value='Retrieve Results' class='btn-primary btn small'>
                </p>
            @endif         
        </form>
    </div>
@endsection