@extends('layouts.master')

@section('title')
    ProfitPoint:Add Product
@endsection

@section('content')
<div class="content">
    <h2>Add a new product</h2>
        @if(count($errors) > 0)
            <div class='alert alert-danger error'>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method='POST' action='/addProduct'>
            {{ csrf_field() }}

            <div class="required">* Required fields</div>

            <p>
                <label for='code'>* Code</label>
                <input type='text' name='code' id='code' value='{{ old('code', 'P000') }}'>
            </p>
            <p>    
                <label for='name'>* Name</label>
                <input type='text' name='name' id='name' value='{{ old('name', 'ProductName') }}'>
            </p>
            <p>
                <input class='btn btn-primary' type='submit' value='Add Product'>
            </p>
        </form>
    </div>
@endsection