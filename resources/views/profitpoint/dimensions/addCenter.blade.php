@extends('layouts.master')

@section('title')
    ProfitPoint:Add Center
@endsection

@section('content')

<h1>Add a new book</h1>

    <form method='POST' action='/addCenter'>
        {{ csrf_field() }}

        <small>* Required fields</small>
        <br>
        <label for='code'>* Code</label>
        <input type='text' name='code' id='code' value='{{ old('code', 'P000') }}'>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', 'CenterName') }}'>

        <label for='type'>* Type</label>
        <select id='type' name='type'>
            <option value=''>Choose</option>
                @foreach($centerTypesForDropdown as $center_type_id => $type)
                <option value='{{ $center_type_id }}'>
                    {{ $type }}
                </option>
            @endforeach
        </select>  

        @if(count($errors) > 0)
            <div class='alert alert-danger error'>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input class='btn btn-primary' type='submit' value='Add new center'>
    </form>

@endsection