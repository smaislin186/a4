@extends('layouts.master')

@section('title')
    ProfitPoint:Products
@endsection

@section('content')
    <div class="content">
        <h2>Products</h2>
        <div class="intro">
        View products
        </div>
        <form method ='GET' action='/editProduct'>
            <table class="table">
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
                        <td><a href='/editProduct/{{ $product->id }}' class='dimAction'>Edit <i class='fa fa-pencil'></i></a>
                        <a href='/deleteProduct/{{ $product->id }}' class='dimAction'>Delete <i class='fa fa-pencil'></i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </form>
        <form method ='GET' action='/addProduct'>
            <input type='submit' value='Add' class='btn-primary btn small'>
            <a href='/addProduct' class='dimAction'>Add <i class='fa fa-pencil'></i></a>
        </form>
    </div>
@endsection