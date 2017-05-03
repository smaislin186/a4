@extends('layouts.master')

@section('title')
    ProfitPoint:Centers
@endsection

@section('content')
    <div class="content">
        <h2>Organization Centers</h2>
        <div class="intro">
        View centers
        </div>
        <form method ='GET' action='/editCenter'>
            <table class="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($centers as $center)
                <tbody>
                    <tr>
                        <td>{{ $center->code }}</td>
                        <td>{{ $center->name }}</td>
                        <td>{{ $center->center_type->type }}</td>
                        <td><a href='/editCenter/{{ $center->id }}' class='bookAction'>Edit <i class='fa fa-pencil'></i></a>
                        <a href='/deleteCenter/{{ $center->id }}' class='bookAction'>Delete <i class='fa fa-pencil'></i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </form>
        <form method ='GET' action='/addCenter'>
            <input type='submit' value='Add' class='btn-primary btn small'>
            <a href='/addCenter' class='bookAction'>Add <i class='fa fa-pencil'></i></a>
        </form>
    </div>
@endsection