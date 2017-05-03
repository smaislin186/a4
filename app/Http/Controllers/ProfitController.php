<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\CenterType;
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

    # GET 
    # /showCenter
    public function showCenter(Request $request) {
        $centers = Center::with('center_type')
            ->orderBy('code', 'ASC')
            ->get();

        $centerTypesForDropdown = CenterType::getCenterTypesForDropdown();
        # Return the view
        return view('profitpoint.showCenter')->with([
            'centers' =>  $centers,  
            'centerTypesForDropdown' => $centerTypesForDropdown,                      
        ]);
    }

    # GET
    # /addCenter
    public function addCenter(Request $request){
        $centerTypesForDropdown = CenterType::getCenterTypesForDropdown();
        return view('profitpoint.addCenter')->with([
           'centerTypesForDropdown' => $centerTypesForDropdown, 
        ]);

    }
    # POST
    # /addCenter
    public function saveNewCenter(Request $request){
        # Custom error message
        // $messages = [
        //     'author_id.not_in' => 'Author not selected.',
        // ];

        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'published' => 'required|numeric',
        //     'cover' => 'required|url',
        //     'purchase_link' => 'required|url',
        //     'author_id' => 'not_in:0',
        // ], $messages);

        # Add new book to database
        $center = new Center();
        $center->code = $request->code;
        $center->name = $request->name;
        $center->parent_id = 0;
        $center->center_type_id = $request->center_type_id;
        $center->save();

        Session::flash('message', 'The center '.$request->code.' was added.');

        # Redirect the user to book index
        return redirect('/showCenter');
    }
    # GET 
    # /editCenter/{id}   
    public function editCenter($id) {
        dump($id);
        $center = Center::find($id);
        $centerTypesForDropdown = CenterType::getCenterTypesForDropdown();
        # Return the view
        return view('profitpoint.editCenter')->with([
           'center' => $center,
           'centerTypesForDropdown' => $centerTypesForDropdown, 
        ]);
    }

    # POST
    # /editCenter
    public function saveCenter(Request $request) {
        # Custom error message
        // $messages = [
        //     'author_id.not_in' => 'Author not selected.',
        // ];
        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'published' => 'required|numeric',
        //     'author_id' => 'not_in:0'
        // ], $messages);
        $center = Center::find($request->id);
        # Edit book in the database
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

        return view('profitpoint.deleteCenter')->with('center', $center);
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

        $center->delete();

        # Finish
        Session::flash('message', $center->code.' was deleted.');
        return redirect('/showCenter');
    }

}
