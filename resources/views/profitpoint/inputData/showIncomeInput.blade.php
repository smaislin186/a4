@extends('layouts.master')

@section('title')
    ProfitPoint:Products
@endsection

@section('content')
    <div class="content">
        <h2>Income Input</h2>
        <div class="intro">
        View Input data
        </div>
        <form method ='GET' action='/editProduct'>
            <table class="table">
                <thead>
                    <tr>
                        <th>Center Code</th>
                        <th>Center Name</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Balance</th>
                        <th>Interest Income</th>
                        <th>Interest Expense</th>
                        <th>Non Interest Income</th>
                        <th>Non Interest Expense</th>
                        <th>Fee Income</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($centers as $center)
                    @foreach($center['products'] as $product)
                        <tbody>
                            <tr>
                                <td>{{ $center->code }}</td>
                                <td>{{ $center->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product['pivot']->balance }}</td>
                                <td>{{ $product['pivot']->interest_income }}</td>
                                <td>{{ $product['pivot']->interest_expense }}</td>
                                <td>{{ $product['pivot']->non_interest_income }}</td>
                                <td>{{ $product['pivot']->non_interest_expense }}</td>
                                <td>{{ $product['pivot']->fee_income }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                @endforeach
            </table>
        </form>
        <form method ='GET' action='/addProduct'>
            <input type='submit' value='Add' class='btn-primary btn small'>
            <a href='/addProduct' class='dimAction'>Add <i class='fa fa-pencil'></i></a>
        </form>
    </div>
@endsection