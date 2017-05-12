@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $product->code }}
@endsection

@section('content')
<div class = "content">
    <h2>Confirm Product Deletion</h2>
    <form method='POST' action='/deleteProduct'>

        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $product->id }}'?>

        <h2>Are you sure you want to delete product
            <em>{{ $product->code }}: {{$product->name}}</em>?</h2>

        <input type='submit' value='Yes, delete this product.' class='btn btn-danger'>

    </form>
</div>
@endsection