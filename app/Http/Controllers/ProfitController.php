<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\CenterType;
use App\Product;
use Session;

class ProfitController extends Controller
{
    # GET /
    # home page
    public function home() { 
        return view('profitpoint.home'); 
    }

    # GET /
    # results page
    public function results() {
        $resultsCenter = Center::getProfitAllCenters();
        $resultsProduct = Product::getProfitAllProducts();
        // dump($resultsCenter);
        // dump($resultsProduct);
    
        return view('profitpoint.home')->with([
            'resultsCenter' => $resultsCenter,  
            'resultsProduct' => $resultsProduct,   
        ]);
    }
    public function showIncomeData(Request $request){

        $centersForDropdown = Center::getCentersForDropdown();
        $productsForDropdown = Product::getProductsForDropdown();

        $centers = Center::with('products')->get();
        // dump($centers);
         dump($centers->toArray());
     
        $product = Product::all();
      
        return view('profitpoint.inputData.showIncomeData')->with([
            'centerTypesForDropdown' => $centersForDropdown,
            'productsForDropdown' => $productsForDropdown,
            'centers' => $centers,
        ]);
    }
    # GET
    # /addIncomeData
    public function addIncomeData(){
        $centersForDropdown = Center::getCentersForDropdown();
        $productsForDropdown = Product::getProductsForDropdown();
        return view('profitpoint.inputData.addIncomeData')->with([
            'centersForDropdown' => $centersForDropdown,
            'productsForDropdown' => $productsForDropdown,
        ]);
    }
    # POST
    # /addIncomeData
    public function saveNewIncomeData(Request $request){
        $messages = [];
        $this->validate($request, [
            'center_id' => 'required',
            'product_id' => 'required',
            'balance' => 'required|numeric',
            'intinc' => 'required|numeric',
            'intexp' => 'required|numeric',
            'nii' => 'required|numeric',
            'nie' => 'required|numeric',
            'feeinc' => 'required|numeric',
        ], $messages);
        //dd($request);
        
        $center = Center::find($request->center_id);
        $product= $request->product_id;

        $data = [
            'balance' => $request-> balance,
            'interest_income' => $request-> intinc,
            'interest_expense' => $request-> intexp,
            'non_interest_income' => $request-> nii,
            'non_interest_expense' => $request-> nie,
            'fee_income' => $request-> feeinc
        ];

        $center->products()->attach($product, $data);
        
        return redirect('/showIncomeData');
    }

    # GET
    # /editIncomeData
    public function editIncomeData($cid, $pid){
        dump($cid);
        dump($pid);
        $center = Center::find($cid)->with('products')->get();
        dump($center->toArray());    
        

        # Return the view
        return view('profitpoint.dimensions.editCenter')->with([
           'center' => $center,
        ]);
    }

    # POST
    # /editIncomeData
    public function saveIncomeData(Request $request){
        $messages = [];
        $this->validate($request, [
            'center_id' => 'required',
            'product_id' => 'required',
            'balance' => 'required|numeric',
            'intinc' => 'required|numeric',
            'intexp' => 'required|numeric',
            'nii' => 'required|numeric',
            'nie' => 'required|numeric',
            'feeinc' => 'required|numeric',
        ], $messages);
        //dd($request);
        
        $center = Center::find($request->center_id);
        $product= $request->product_id;

        $data = [
            'balance' => $request-> balance,
            'interest_income' => $request-> intinc,
            'interest_expense' => $request-> intexp,
            'non_interest_income' => $request-> nii,
            'non_interest_expense' => $request-> nie,
            'fee_income' => $request-> feeinc
        ];

        $center->products()->attach($product, $data);
        
        return redirect('/showIncomeData');
    }
}
