@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $center->code }}
@endsection

@section('content')

    <h1>Confirm deletion</h1>
    <form method='POST' action='/deleteCenter'>

        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $center->id }}'?>

        <h2>Are you sure you want to delete <em>{{ $center->code }}, {{$center->name}}</em>?</h2>

        <input type='submit' value='Yes, delete this center.' class='btn btn-danger'>

    </form>

@endsection