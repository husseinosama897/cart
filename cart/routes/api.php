<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiCateogryController;

use App\Http\Controllers\ApiProductController;

use App\Http\Controllers\ApiUiController;

use App\Http\Controllers\ApiReportController;

use App\Http\Controllers\ApisupplierController;

use App\Http\Controllers\ApiOrderAdminController;







/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




/*
Route::get('/json/categories/', [ApiUiController::class, 'categoryjson']);
Route::get('/json/categories/{category}', [ApiUiController::class, 'jsoncategory']);
Route::get('/categories/{slug}/{category}', [ApiUiController::class, 'categorypage']);



Route::group(['middleware'=>['auth:sanctum']],function(){


// -----------------------------Orders----------------------------------------//
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/',[ApiOrderAdminController::class,'index'])->name('index');
    Route::put('/update',[SettingController::class,'update'])->name('update');
    // read order
Route::get('/revieworder/{order}', [ApiOrderAdminController::class, 'revieworder'])->name('admin.revieworder');

//change status order

Route::post('/changestatus/{order}', [ApiOrderAdminController::class, 'changestatus']);

// json order table 
Route::post('/orderjson', [ApiOrderAdminController::class, 'orderjson']);
//table orders
Route::post('/orders_index', [ApiOrderAdminController::class, 'index']);
///end of orders routes

});






    //create supplier
Route::post('/createsupplier', [ApisupplierController::class, 'createsupp'])->name('createsupplier');

// for autocomplete supplier
Route::post('/getselectboxsupp', [ApisupplierController::class, 'getselectboxsupp']);


//supplier create page
Route::get('/supplier_create_page', [ApisupplierController::class, 'createpage'])->name('admin.suppliers.create');

//supplier select box //chunk 
Route::get('/supplierselex', [ApisupplierController::class, 'supplierselex']);

// supplier update
Route::post('/updatesupp/{supplier}', [ApisupplierController::class, 'updatesupp']);

// supplier delete 
Route::post('/deletesupp/{supplier}', [ApisupplierController::class, 'delete']);
///end of supplier routes







    // the besties coupon 
    Route::get('/jsonbestcoupon', [ApiReportController::class, 'jsonbestcoupon'])
    ->name('jsonbestcoupon');
    

     // canceled orders Report   json 
    
    Route::post('/jsonArrivedOrderReport', [ApiReportController::class, 'jsonArrivedOrderReport'])
    ->name('jsonArrivedOrderReport');
    
    
    
    
    // canceled orders report json 
    Route::post('/jsoncanceledOrderReport', [ApiReportController::class, 'jsoncanceledOrderReport'])
    ->name('jsoncanceledOrderReport');
 
    
  
    
    /// json_Rportsales
    
    Route::post('/jsonRportsales', [ApiReportController::class, 'jsonRportsales'])
    ->name('jsonRportsales');
    
    
    //customer_purchases
    
    Route::get('/json_customer_purchases', [ApiReportController::class, 'json_customer_purchases'])
    ->name('json_customer_purchases');
    
    
    // json Report of the best selling products_by_supplier page
    Route::get('/json_products_by_supplier', [ApiReportController::class, 'json_products_by_supplier'])
    ->name('json_products_by_supplier');
    
    /// bestsellerpage
    //json
    Route::post('/bestsellerjson', [ApiReportController::class, 'bestsellerjson'])
    ->name('bestsellerjson');
    
 

    ///json_newcustomer
    Route::get('/jsonnewcustomer', [ApiReportController::class, 'jsonnewcustomer'])
    ->name('jsonnewcustomer');
    
    
    /////////

/// cateogires

// update category
Route::post('/categories_update/{category}', [ApiCateogryController::class, 'update'])->name('category_update');
// delete category 
Route::post('/categories_delete/{category}', [ApiCateogryController::class, 'delete'])->name('category_delete');
// save category
Route::post('/categories_save', [ApiCateogryController::class, 'save'])->name('categories_save');






// products
// save product 
Route::post('/save_products', [ApiProductController::class, 'products'])->name('save_products');
// update product
Route::post('/update_data_product/{product}', [ApiProductController::class, 'update'])->name('update_data_product');

// delete product
Route::get('/delete_product/{product}', [productController::class, 'delete'])->name('delete_product');



});
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
