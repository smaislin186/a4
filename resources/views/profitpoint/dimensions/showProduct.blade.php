@extends('layouts.master')

@section('title')
    ProfitPoint:Products
@endsection

@section('content')
    <div class="content">
        <h2>Products</h2>
        <form method ='GET' action='/editProduct'>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($products as $product)
                <tbody>
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td><a href='/editProduct/{{ $product->id }}' class="glyphicon glyphicon-pencil"></a>
                        <a href='/deleteProduct/{{ $product->id }}'class="glyphicon glyphicon-trash"></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </form>
        <form method ='GET' action='/addProduct'>
            <input type='submit' value='Add' class='btn-primary btn small'>
        </form>
    </div>
@endsection