@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $product->name }}
@endsection

@section('content')
    <div class="content">
        <h2>Edit Product</h2>
        <form method ='POST' action='/editProduct'>
            {{ csrf_field() }}
            
            <div class="required">* Required fields</div>
            
            <input type='hidden' name='id' value='{{ $product->id }}'>
            
            <p>
                <label for='code'>* Code</label>
                <input type='text' name='code' id='code' value='{{ old('code', $product->code) }}'> 
            </p>
            <p>
                <label for='name'>* Name</label>
                <input type='text' name='name' id='name' value='{{ old('name', $product->name) }}'> 
            </p>
            <p>
                <input type='submit' value='Save' class='btn-primary btn small'>            
            </p>
    </div>
@endsection