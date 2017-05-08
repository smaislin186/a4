@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $product->code }}
@endsection

@section('content')

    <h1>Confirm deletion</h1>
    <form method='POST' action='/deleteProduct'>

        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $product->id }}'?>

        <h2>Are you sure you want to delete <em>{{ $product->code }}, {{$product->name}}</em>?</h2>

        <input type='submit' value='Yes, delete this product.' class='btn btn-danger'>

    </form>

@endsection