<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\CenterType;
use App\Product;
use Lava;
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
    public function results(Request $request) {

        $center = 'None';
        $product = 'None';
        $centerHideEmpty = 'false';
        $productHideEmpty = 'false';
        $centersForDropdown = Center::getCentersForDropdown();
        $productsForDropdown = Product::getProductsForDropdown();

        return view('profitpoint.results')->with([
            'center' => $center, 
            'product' => $product,
            'centerHideEmpty' => $centerHideEmpty,
            'productHideEmpty' => $productHideEmpty,
            'centersForDropdown' => $centersForDropdown,
            'productsForDropdown' => $productsForDropdown,
        ]);
    }

    # POST
    # /results
    public function resultsView(Request $request){
        
        //  dd($request->centerHideEmpty);
        $this->validate($request, [
            'center' => 'required',
            'product' => 'required',
        ]);
        
        $center = $request->center;    
        $product =  $request->product;         
        $centerHideEmpty = ($request->has('centerHideEmpty')) ? $request->centerHideEmpty : '' ;
        $productHideEmpty = ($request->has('productHideEmpty')) ? $request->productHideEmpty : '' ;

        
        # get results for CENTERS
        if($center == 'All'){
            # sum the results from the pivot table then add to data table for graph
            $resultsTable = Center::createRawDataTable(Center::getProfitAllCenters($centerHideEmpty));
            # link data table to chart 
            # chart variable is available in memory, does not need to be explicitly passed back to view
            $chart = Lava::ColumnChart('Center Profit',$resultsTable);
        }
        else{
            $resultsTable = Center::createRawDataTable(Center::getProfitOneCenter($center));
            $chart = Lava::ColumnChart('Center Profit',$resultsTable);
        }

        # get results for PRODUCTS
        if($product == 'All'){
            $resultsTable = Product::createRawDataTable(Product::getProfitAllProducts($productHideEmpty));
            $chart = Lava::ColumnChart('Product Profit',$resultsTable);
        }
        else{
            $resultsTable = Product::createRawDataTable(Product::getProfitOneProduct($product));
            $chart = Lava::ColumnChart('Product Profit',$resultsTable);
        }

        $centersForDropdown = Center::getCentersForDropdown();
        $productsForDropdown = Product::getProductsForDropdown();

        return view('profitpoint.results')->with([
            'center' => $center, 
            'product' => $product,
            'centerHideEmpty' => $centerHideEmpty,
            'productHideEmpty' => $productHideEmpty,
            'centersForDropdown' => $centersForDropdown,
            'productsForDropdown' => $productsForDropdown,
        ]);
    }

    public function showIncomeData(Request $request){

        $centersForDropdown = Center::getCentersForDropdown();
        $productsForDropdown = Product::getProductsForDropdown();

        $centers = Center::with('products')->get();
        // dump($centers);
        //dump($centers->toArray());
     
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
