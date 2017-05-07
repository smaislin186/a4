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
    public function results() {
        # get profit results for dimensions from pivot table
        $resultsCenter = Center::getProfitAllCenters();
        $resultsProduct = Product::getProfitAllProducts();
        $resultsProduct1 = Product::getProfitOneProduct(4);
        $resultsCenter1 = Center::getProfitOneCenter(2);
        dump($resultsCenter);
        dump($resultsCenter1);
        
        # define data table structure for the graph
        $centersTable = Lava::DataTable();
        $centersTable->addStringColumn('Center')
            ->addNumberColumn('Interest Income')
            ->addNumberColumn('Interest Expense')
            ->addNumberColumn('Non Interest Income')
            ->addNumberColumn('Non Interest Expense')
            ->addNumberColumn('Fee Income');
        # add the data rows for the graph
        foreach($resultsCenter as $value){
            $centersTable->addRow([
                $value['name'], $value['IntInc'], $value['IntExp'],$value['NII'],$value['NIE'],$value['FeeInc'],                    
            ]);
        }

        # link data table to chart 
        # chart variable is available in memory, does not need to be passed back to view
        $chart = Lava::ColumnChart('Center Profit',$centersTable);

         # define data table structure for the graph
        $productsTable = Lava::DataTable();
        $productsTable->addStringColumn('Product')
            ->addNumberColumn('Interest Income')
            ->addNumberColumn('Interest Expense')
            ->addNumberColumn('Non Interest Income')
            ->addNumberColumn('Non Interest Expense')
            ->addNumberColumn('Fee Income');
        # add the data rows for the graph
        foreach($resultsProduct as $value){
            $productsTable->addRow([
                $value['name'], $value['IntInc'], $value['IntExp'],$value['NII'],$value['NIE'],$value['FeeInc'],                    
            ]);
        }

        # link data table to chart 
        # chart variable is available in memory, does not need to be passed back to view
        $chart = Lava::ColumnChart('Product Profit',$productsTable);
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
