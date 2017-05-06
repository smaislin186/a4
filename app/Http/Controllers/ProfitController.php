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
}
