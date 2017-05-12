@extends('layouts.master')

@section('title')
    ProfitPoint:Add Input Data
@endsection

@section('content')
<div class = "content">
    <h2>Add new Income and Expense entries</h2>

        <form method='POST' action='/addIncomeData'>
            {{ csrf_field() }}

            @if(count($errors) > 0)
                <div class='alert alert-danger error'>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="required">* Required fields</div>
            <p>
                <label for='type'>* Center Name</label>
                <select id='center_id' name='center_id'>
                    <option value=''>Choose</option>
                        @foreach($centersForDropdown as $center_id => $name)
                        <option value='{{ $center_id }}'>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>  
            </p>
            <p>
                <label for='type'>* Product Name</label>
                <select id='product_id' name='product_id'>
                    <option value=''>Choose</option>
                        @foreach($productsForDropdown as $product_id => $name)
                        <option value='{{ $product_id }}'>
                            {{ $name }}
                        </option>
                    @endforeach
                </select> 
            </p>
            <p>
                <label for='balance'>Balance</label>
                <input type='number' name='balance' id='balance' value='{{ old('Balance', '0') }}'>
            </p>
            <p>
                <label for='intinc'>Interest Income</label>
                <input type='number' name='intinc' id='intinc' value='{{ old('Interest Income', '0') }}'>
            </p>
            <p>
                <label for='intexp'>Interest Expense</label>
                <input type='number' name='intexp' id='intexp' value='{{ old('Interest Expense', '0') }}'>
            </p>
            <p>
                <label for='nii'>Non Interest Income</label>
                <input type='number' name='nii' id='nii' value='{{ old('Non Interest Income', '0') }}'>
            </p>
            <p>
                <label for='nie'>Non Interest Expense</label>
                <input type='number' name='nie' id='nie' value='{{ old('Non Interest Expense', '0') }}'>
            </p>
            <p>
                <label for='feeinc'>Fee Income</label>
                <input type='number' name='feeinc' id='feeinc' value='{{ old('Fee Income', '0') }}'>
            </p>
            <p>
            <input class='btn btn-primary' type='submit' value='Add Data'>
            </p>
        </form>
    </div>
@endsection