@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $center->code }}
@endsection

@section('content')
    <div class="content">
        <h2>Edit Organization Center</h2>
        <div class="intro">
            Edit Centers
        </div>
        <form method ='POST' action='/editCenter'>
            {{ csrf_field() }}
            
            <p>* Required fields</p>
            
            <input type='hidden' name='id' value='{{ $center->id }}'>
            
            <label for='code'>* Code</label>
            <input type='text' name='code' id='code' value='{{ old('code', $center->code) }}'> 
            
            <label for='name'>* Name</label>
            <input type='text' name='name' id='name' value='{{ old('name', $center->name) }}'> 

            <label for='type'>* Type</label>
            <select id='center_type_id' name='center_type_id'>
                <option value='0'>Choose</option>
                 @foreach($centerTypesForDropdown as $center_type_id => $type)
                    <option value='{{ $center_type_id }}' {{ ($center->center_type_id == $center_type_id) ? 'SELECTED' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>    
            <input type='submit' value='Save' class='btn-primary btn small'>            
    </div>
@endsection