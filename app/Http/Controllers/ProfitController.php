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
    public function home(Request $request) {
             
        # Return the view
        return view('profitpoint.home')->with([
            
        ]);
    }

    public function showIncomeInput(Request $request){

        $centersForDropdown = Center::getCentersForDropdown();
        $productsForDropdown = Product::getProductsForDropdown();

        $centers = Center::with('products')->get();
        // dump($centers);
        // dump($centers->toArray());
     
        $product = Product::all();
      
        return view('profitpoint.inputData.showIncomeInput')->with([
            'centerTypesForDropdown' => $centersForDropdown,
            'productsForDropdown' => $productsForDropdown,
            'centers' => $centers,
        ]);
    }
}
