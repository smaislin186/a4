<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\CenterType;
use App\Product;
use Session;

class DimensionController extends Controller
{
    /*
    CENTER
    */
    # GET 
    # /showCenter
    public function showCenter(Request $request) {
        $centers = Center::with('center_type')
            ->orderBy('code', 'ASC')
            ->get();

        $centerTypesForDropdown = CenterType::getCenterTypesForDropdown();
        # Return the view
        return view('profitpoint.dimensions.showCenter')->with([
            'centers' =>  $centers,  
            'centerTypesForDropdown' => $centerTypesForDropdown,                      
        ]);
    }

    # GET
    # /addCenter
    public function addCenter(){
        $centerTypesForDropdown = CenterType::getCenterTypesForDropdown();
        return view('profitpoint.dimensions.addCenter')->with([
           'centerTypesForDropdown' => $centerTypesForDropdown, 
        ]);

    }

    # POST
    # /addCenter
    public function saveNewCenter(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);

        # Add new center to database
        $center = new Center();
        $code = $request->code;
        if(Center::where('code', $code)->get()->isEmpty())
        {   
            $center->code = $code;
        }
        else{
            Session::flash('message', 'Center with Code:'.$code .' already exists');
            $errors = 'Center Code '.$code.' already exists';
            return redirect('/addCenter');
        }

        $center->name = $request->name;
        $center->parent_id = 0;
        $center->center_type_id = $request->type;
        $center->save();

        Session::flash('message', 'The center '.$code.' was added.');

        # Redirect the user to display all centers
        return redirect('/showCenter');
    }

    # GET 
    # /editCenter/{id}   
    public function editCenter($id) {
        $center = Center::find($id);
        $centerTypesForDropdown = CenterType::getCenterTypesForDropdown();
        # Return the view
        return view('profitpoint.dimensions.editCenter')->with([
           'center' => $center,
           'centerTypesForDropdown' => $centerTypesForDropdown, 
        ]);
    }

    # POST
    # /editCenter
    public function saveCenter(Request $request) {
        $center = Center::find($request->id);

        $center->code = $request->code;
        $center->name = $request->name;
        $center->center_type_id = $request->center_type_id;

        $center->save();
        Session::flash('message', 'Your changes to '.$center->code.' were saved.');
        return redirect('/showCenter');
    }

    # GET 
    # /confirmDeleteCenter/{id} 
    public function confirmDeleteCenter($id) {
        #Get the center attempting to delete
        $center = Center::find($id);

        if(!$center) {
            Session::flash('message', 'Center does not exist.');
            return redirect('/showCenter');
        }

        return view('profitpoint.dimensions.deleteCenter')->with('center', $center);
    }

    # POST
    # /deleteCenter
    public function deleteCenter(Request $request) {
        # Get the center to be deleted
        $center = Center::find($request->id);

        if(!$center) {
            Session::flash('message', 'Deletion failed; center not found.');
            return redirect('/showCenter');
        }

        $center->products()->detach();
        $center->delete();

        # Finish
        Session::flash('message', $center->code.' was deleted.');
        return redirect('/showCenter');
    }

    /*
    PRODUCT
    */
    # GET 
    # /showProduct
    public function showProduct(Request $request) {
        $products = Product::orderBy('code', 'ASC')->get();

        # Return the view
        return view('profitpoint.dimensions.showProduct')->with([
            'products' =>  $products,                 
        ]);
    }

    # GET
    # /addProduct
    public function addProduct(Request $request){
        return view('profitpoint.dimensions.addProduct');
    }

    # POST
    # /addProduct
    public function saveNewProduct(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
        ]);

        $product = new Product();
        $code = $request->code;
        
        # check for unique code
        $code = $request->code;
        if(Product::where('code', $code)->get()->isEmpty())
        {   
            $product->code = $code;
        }
        else{
            Session::flash('message', 'Product Code:'.$code.' already exists');
            $errors = 'Product Code '.$code.' already exists';
            return redirect('/addProduct');
        }

        $product->name = $request->name;
        $product->parent_id = 0;
        $product->save();

        Session::flash('message', 'The product '.$code.' was added.');

        # Redirect the user to book index
        return redirect('/showProduct');
    }

    # GET 
    # /editCenter/{id}   
    public function editProduct($id) {
        dump($id);
        $product = Product::find($id);
        
        # Return the view
        return view('profitpoint.dimensions.editProduct')->with([
           'product' => $product,
        ]);
    }

    # POST
    # /editProduct
    public function saveProduct(Request $request) {

        $product = Product::find($request->id);

        $product->code = $request->code;
        $product->name = $request->name;

        $product->save();
        Session::flash('message', 'Your changes to '.$product->code.' were saved.');
        return redirect('/showProduct');
    }

    # GET 
    # /confirmDeleteProduct/{id} 
    public function confirmDeleteProduct($id) {
        #Get the product attempting to delete
        $product = Product::find($id);

        if(!$product) {
            Session::flash('message', 'Product does not exist.');
            return redirect('/showProduct');
        }

        return view('profitpoint.dimensions.deleteProduct')->with('product', $product);
    }

    # POST
    # /deleteProduct
    public function deleteProduct(Request $request) {
        # Get the product to be deleted
        $product = Product::find($request->id);

        if(!$product) {
            Session::flash('message', 'Deletion failed; product not found.');
            return redirect('/showProduct');
        }

        $product->centers()->detach();
        $product->delete();

        # Finish
        Session::flash('message', $product->code.' was deleted.');
        return redirect('/showProduct');
    }

}
