@extends('layouts.master')

@section('title')
    ProfitPoint:Home
@endsection

@section('content')
    <div class="content">
        <h2>Introduction</h2>
    </div>
        <div class="intro">
            Profit Point is the start of an application that lets companys dynamically analyze 
            profits and losses for their institution. 
        </div>
        <div class="intro">
            In this fixed example, a bank wants to analyze income and expense data by Centers and Products.
        </div>
        <div class="intro">
            A Center is a branch (typically a profitable center) or backoffice (typically a cost center). 
            Products can be anything from loans or deposits to swaps and derivatives.
        </div>
        <div class="intro">
            The goal of any institution is to learn where they are making or losing profits. Analyzing data at 
            a granular level can help institutions, like a bank, figure out which products or centers are performing 
            the best and make actionable decisions to increase profit margins.
        </div>
        
        <div class = "instructions">
            <div class="content">
                <h2>How to use the application:</h2>
            </div>
                <ol style="list">
                    <li>Add Centers by clicking on <em>Manage Centers</em>.</li> 
                    <li>Add Products by clicking on <em>Manage Products</em>.</li> 
                    <li>Add Income and Expense information for the Centers and Products on the <em>Manage Input page</em>.</li>
                    <li>View summarized results by clicking on <em>Results</em>.</li>
                </ol>
        </div>
@endsection