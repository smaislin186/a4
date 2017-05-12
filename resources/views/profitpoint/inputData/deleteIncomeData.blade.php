@extends('layouts.master')

@section('title')
    ProfitPoint:Delete Income Data
@endsection

@section('content')
<div class="content">
    <h2>Confirm deletion</h2>
    <form method='POST' action='/deleteIncomeData'>

        {{ csrf_field() }}

        <input type='hidden' name='pid' value='{{ $pid }}'?>
        <input type='hidden' name='cid' value='{{ $cid }}'?>

        <h2>Are you sure you want to delete data for Center:
            <em>tbd </em> 
            and Product: <em>tbd</em> ?</h2>

        <input type='submit' value='Yes, delete this income data.' class='btn btn-danger'>

    </form>
</div>
@endsection