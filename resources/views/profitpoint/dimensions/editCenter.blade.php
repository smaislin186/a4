@extends('layouts.master')

@section('title')
    ProfitPoint:{{ $center->code }}
@endsection

@section('content')
    <div class="content">
        <h2>Edit Center</h2>
        <form method ='POST' action='/editCenter' class="colform">
            {{ csrf_field() }}
            
            <div class="required">* Required fields</div>
            
            <input type='hidden' name='id' value='{{ $center->id }}'>
            <p>
                <label for='code'>* Code</label>
                <input type='text' name='code' id='code' value='{{ old('code', $center->code) }}'> 
            </p>
            <p>
                <label for='name'>* Name</label>
                <input type='text' name='name' id='name' value='{{ old('name', $center->name) }}'> 
            </p>  
            <p> 
                <label for='type'>* Type</label>
                <select id='center_type_id' name='center_type_id'>
                    <option value='0'>Choose</option>
                    @foreach($centerTypesForDropdown as $center_type_id => $type)
                        <option value='{{ $center_type_id }}' {{ ($center->center_type_id == $center_type_id) ? 'SELECTED' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>    
            </p>
            <p>
                <input type='submit' value='Save' class='btn-primary btn small'>            
            </p>
    </div>
@endsection