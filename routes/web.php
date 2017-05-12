<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# /
# Main homepage visitors see when they visit the site 
Route::get('/', 'ProfitController@home');

# /results
Route::get('/results', 'ProfitController@results');
Route::post('/results', 'ProfitController@resultsView');

# /showCenter
Route::get('/showCenter', 'DimensionController@showCenter');
# /addCenter
Route::get('/addCenter', 'DimensionController@addCenter');
Route::post('/addCenter', 'DimensionController@saveNewCenter');
# /editCenter
Route::get('/editCenter/{id}', 'DimensionController@editCenter');
Route::post('/editCenter', 'DimensionController@saveCenter');
# /deleteCenter
Route::get('/deleteCenter/{id}', 'DimensionController@confirmDeleteCenter');
Route::post('/deleteCenter', 'DimensionController@deleteCenter');

# /showProduct
Route::get('/showProduct', 'DimensionController@showProduct');
# /addProduct
Route::get('/addProduct', 'DimensionController@addProduct');
Route::post('/addProduct', 'DimensionController@saveNewProduct');
# /editProduct
Route::get('/editProduct/{id}', 'DimensionController@editProduct');
Route::post('/editProduct', 'DimensionController@saveProduct');
# /deleteProduct
Route::get('/deleteProduct/{id}', 'DimensionController@confirmDeleteProduct');
Route::post('/deleteProduct', 'DimensionController@deleteProduct');

# /showIncomeInput
Route::get('/showIncomeData', 'ProfitController@showIncomeData');
# /addIncomeInput
Route::get('/addIncomeData', 'ProfitController@addIncomeData');
Route::post('/addIncomeData', 'ProfitController@saveNewIncomeData');
# /editIncomeInput
Route::get('/editIncomeData/C:{cid}P:{pid}', 'ProfitController@editIncomeData');
Route::post('/editIncomeData', 'ProfitController@saveIncomeData');
# /deleteIncomeInput
Route::get('/deleteIncomeData/C:{cid}P:{pid}', 'ProfitController@confirmDeleteIncomeData');
Route::post('/deleteIncomeData', 'ProfitController@deleteIncomeData');

# /showRules
Route::get('/showRules', 'ProfitController@showRules');
# /editRules
Route::get('/editRules', 'ProfitController@editRules');

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database profitpoint');
        DB::statement('CREATE database profitpoint');

        return 'Dropped profitpoint; created profitpoint.';
    });

};
