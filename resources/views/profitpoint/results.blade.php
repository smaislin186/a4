@extends('layouts.master')

@section('title')
    ProfitPoint:Results
@endsection

@section('content')
    <div class="content">
        <h2>Center Profitability</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Interest Income</th>
                    <th>Breakout by Product</th>
                </tr>
            </thead>
            @foreach($results as $center)
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $center->name }}</td>
                    <td>{{ $center->interest_income }}</td>
                    <td><a href='/editCenter/{{ $center->id }}' class='dimAction'>Edit <i class='fa fa-pencil'></i></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection