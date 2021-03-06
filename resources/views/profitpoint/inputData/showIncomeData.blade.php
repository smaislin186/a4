@extends('layouts.master')

@section('title')
    ProfitPoint:Products
@endsection

@section('content')
    <div class="content">
        <h2>Income and Expense Input Data</h2>
        <form method ='GET' action='/editProduct'>
            <table class="table table-hover">
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
                                <td><a href='/editIncomeData/C:{{$center->id}}P:{{$product['id']}}' class="glyphicon glyphicon-pencil"></a>
                                    <a href='/deleteIncomeData/C:{{$center->id}}P:{{$product['id']}}' class="glyphicon glyphicon-trash"></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                @endforeach
            </table>
        </form>
        <form method ='GET' action='/addIncomeData'>
            <input type='submit' value='Add' class='btn-primary btn small'>
        </form>
    </div>
@endsection