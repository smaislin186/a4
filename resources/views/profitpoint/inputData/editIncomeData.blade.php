@extends('layouts.master')

@section('title')
    ProfitPoint:Add Input Data
@endsection

@section('content')

<h1>Edit Input Data</h1>
<div class="content">
    <form method='POST' action='/addIncomeData' class="colform">
        {{ csrf_field() }}

        <div class="required">* Required fields</div>
        <p>
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
        </p>
        <p>
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
        </p>
        <p>
            <label for='balance'>Balance</label>
            <input type='number' name='balance' id='balance' value='{{ old('Balance', $balance) }}'>
        </p>
        <p>
            <label for='intinc'>Interest Income</label>
            <input type='number' name='intinc' id='intinc' value='{{ old('Interest Income', $intinc) }}'>
        </p>
        <p>
            <label for='intexp'>Interest Expense</label>
            <input type='number' name='intexp' id='intexp' value='{{ old('Interest Expense', $intexp) }}'>
        </p>
        <p>
            <label for='nii'>Non Interest Income</label>
            <input type='number' name='nii' id='nii' value='{{ old('Non Interest Income', $nii) }}'>
        </p>
        <p>
            <label for='nie'>Non Interest Expense</label>
            <input type='number' name='nie' id='nie' value='{{ old('Non Interest Expense', $nie) }}'>
        </p>
        <p>
            <label for='feeinc'>Fee Income</label>
            <input type='number' name='feeinc' id='feeinc' value='{{ old('Fee Income', $feeinc) }}'>
        </p>
        <p>
            <input class='btn btn-primary' type='submit' value='Save Changes'>
        </p>
    </form>
</div>
@endsection