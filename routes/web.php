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
Route::get('/deleteProduct/Center{cid}Product{pid}', 'DimensionController@confirmDeleteProduct');
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
Route::get('/deleteIncomeData/{id}', 'ProfitController@confirmDeleteIncomeData');
Route::post('/deleteIncomeData', 'ProfitController@deleteIncomeData');

# /showRules
Route::get('/showRules', 'ProfitController@showRules');
# /editRules
Route::get('/editRules', 'ProfitController@editRules');


// Route::get('/debug', function() {

// 	echo '<pre>';

// 	echo '<h1>Environment</h1>';
// 	echo App::environment().'</h1>';

// 	echo '<h1>Debugging?</h1>';
// 	if(config('app.debug')) echo "Yes"; else echo "No";

// 	echo '<h1>Database Config</h1>';
//     	echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;
//     	/*
// 	The following commented out line will print your MySQL credentials.
// 	Uncomment this line only if you're facing difficulties connecting to the database and you
//         need to confirm your credentials.
//         When you're done debugging, comment it back out so you don't accidentally leave it
//         running on your production server, making your credentials public.
//         */
// 	//print_r(config('database.connections.mysql'));

// 	echo '<h1>Test Database Connection</h1>';
// 	try {
// 		$results = DB::select('SHOW DATABASES;');
// 		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
// 		echo "<br><br>Your Databases:<br><br>";
// 		print_r($results);
// 	}
// 	catch (Exception $e) {
// 		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
// 	}

// 	echo '</pre>';

// });

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database profitpoint');
        DB::statement('CREATE database profitpoint');

        return 'Dropped profitpoint; created profitpoint.';
    });

};
