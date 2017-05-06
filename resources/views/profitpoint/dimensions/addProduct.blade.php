@extends('layouts.master')

@section('title')
    ProfitPoint:Add Product
@endsection

@section('content')

<h1>Add a new product</h1>

    <form method='POST' action='/addProduct'>
        {{ csrf_field() }}

        <small>* Required fields</small>

        <label for='title'>* Code</label>
        <input type='text' name='code' id='code' value='{{ old('Code', 'P000') }}'>

        <label for='published'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('Name', 'ProductName') }}'>

        <input class='btn btn-primary' type='submit' value='Add new product'>
    </form>

@endsection