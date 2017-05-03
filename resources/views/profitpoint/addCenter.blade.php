@extends('layouts.master')

@section('title')
    ProfitPoint:Add Center
@endsection

@section('content')

<h1>Add a new book</h1>

    <form method='POST' action='/addCenter'>
        {{ csrf_field() }}

        <small>* Required fields</small>

        <label for='title'>* Code</label>
        <input type='text' name='code' id='code' value='{{ old('Code', 'P000') }}'>

        <label for='published'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('Name', 'CenterName') }}'>

        <label for='type'>* Type</label>
        <select id='center_type_id' name='center_type_id'>
            <option value='0'>Choose</option>
                @foreach($centerTypesForDropdown as $center_type_id => $type)
                <option value='{{ $center_type_id }}'>
                    {{ $type }}
                </option>
            @endforeach
        </select>  

        <input class='btn btn-primary' type='submit' value='Add new center'>
    </form>

@endsection