@extends('layouts.master')

@section('title')
    ProfitPoint:Add Center
@endsection

@section('content')
    <div class="content">
        <h2>Add a new center</h2>
        <form method='POST' action='/addCenter'>
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
                <label for='code'>* Code</label>
                <input type='text' name='code' id='code' value='{{ old('code', 'P000') }}'>
            </p>
            <p>
                <label for='name'>* Name</label>
                <input type='text' name='name' id='name' value='{{ old('name', 'CenterName') }}'>
            </p>
            <p>
                <label for='type'>* Type</label>
                <select id='type' name='type'>
                    <option value=''>Choose</option>
                        @foreach($centerTypesForDropdown as $center_type_id => $type)
                        <option value='{{ $center_type_id }}'>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>  
            </p>

            @if(count($errors) > 0)
                <div class='alert alert-danger error'>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <p>
            <input class='btn btn-primary' type='submit' value='Add Center'>
            </p>
        </form>
    </div>
@endsection