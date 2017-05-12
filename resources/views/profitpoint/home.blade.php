@extends('layouts.master')

@section('title')
    ProfitPoint:Home
@endsection

@section('content')
    <div class="content">
        <h2>Profit Point</h2>
        <div class="intro">
            Profit Point is the start of an application that lets companys dynamically analyze 
            profits and losses for their institution. 
            <br>
            In this fixed example, a bank wants to analyze income and expense data by Centers and Products.
            <br>
            A Center is a branch (typically a profitable center) or backoffice (typically a cost center). 
            Products can be anything from loans or deposits to swaps and derivatives.
            br>
            The goal of any institution is to learn where they are making or losing profits. Analyzing data at 
            a granular level can help institutions, like a bank, figure out which products or centers are performing 
            the best and make actionable decisions to increase profit margins.
            <br>
            <h3>How to use the application:</h3>
            <ul style="list">
            <li>Add Centers by clicking on Manage Centers.</li> 
            <li>Add Products by clicking on Manage Products.</li> 
            <li>Add Income and Expense information for the Centers and Products on the Manage Input page.</li>
            <li>View summarized results by clicking on Results.</li>
        </div>
    </div>
@endsection