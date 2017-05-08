@extends('layouts.master')

@section('title')
    ProfitPoint:Add Product
@endsection

@section('content')

<h1>Add a new product</h1>

    <form method='POST' action='/addProduct'>
        {{ csrf_field() }}

        <small>* Required fields</small>
        <br>
        <label for='code'>* Code</label>
        <input type='text' name='code' id='code' value='{{ old('code', 'P000') }}'>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', 'ProductName') }}'>

        <input class='btn btn-primary' type='submit' value='Add new product'>
    </form>

@endsection