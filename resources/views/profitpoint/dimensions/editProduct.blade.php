@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $product->name }}
@endsection

@section('content')
    <div class="content">
        <h2>Edit Product</h2>
        <div class="intro">
            Edit Product
        </div>
        <form method ='POST' action='/editProduct'>
            {{ csrf_field() }}
            
            <p>* Required fields</p>
            
            <input type='hidden' name='id' value='{{ $product->id }}'>
            
            <label for='code'>* Code</label>
            <input type='text' name='code' id='code' value='{{ old('code', $product->code) }}'> 
            
            <label for='name'>* Name</label>
            <input type='text' name='name' id='name' value='{{ old('name', $product->name) }}'> 
 
            <input type='submit' value='Save' class='btn-primary btn small'>            
    </div>
@endsection