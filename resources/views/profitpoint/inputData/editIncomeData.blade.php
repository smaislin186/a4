@extends('layouts.master')

@section('title')
    ProfitPoint:Add Input Data
@endsection

@section('content')

<h1>Add new Income and Expense entries</h1>

    <form method='POST' action='/addIncomeData'>
        {{ csrf_field() }}

        <small>* Required fields</small>

        <label for='type'>* Center Name</label>
        <select id='center_id' name='center_id'>
            @foreach($centersForDropdown as $center_id => $name)
                <option value='{{ $center_id }}'
                    @if($center_id == $cid)
                        selected
                    @endif
                    >
                    {{ $name }}
                </option>
            @endforeach
        </select>  

        <label for='type'>* Product Name</label>
        <select id='product_id' name='product_id'>
            @foreach($productsForDropdown as $product_id => $name)
                <option value='{{ $product_id }}' 
                    @if($product_id == $pid)
                        selected
                    @endif
                    > 
                    {{ $name }}
                </option>
            @endforeach
        </select> 
        <br>
        <label for='title'>Balance</label>
        <input type='number' name='balance' id='balance' value='{{ old('Balance', $balance) }}'>
        <br>
        <label for='title'>Interest Income</label>
        <input type='number' name='intinc' id='intinc' value='{{ old('Interest Income', $intinc) }}'>

        <label for='title'>Interest Expense</label>
        <input type='number' name='intexp' id='intexp' value='{{ old('Interest Expense', $intexp) }}'>
        <br>
        <label for='title'>Non Interest Income</label>
        <input type='number' name='nii' id='nii' value='{{ old('Non Interest Income', $nii) }}'>

        <label for='title'>Non Interest Expense</label>
        <input type='number' name='nie' id='nie' value='{{ old('Non Interest Expense', $nie) }}'>
        <br>
        <label for='title'>Fee Income</label>
        <input type='number' name='feeinc' id='feeinc' value='{{ old('Fee Income', $feeinc) }}'>

        <input class='btn btn-primary' type='submit' value='Save Data'>
    </form>

@endsection