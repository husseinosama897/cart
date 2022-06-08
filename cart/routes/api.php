<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiCateogryController;

use App\Http\Controllers\ApiProductController;

use App\Http\Controllers\ApiUiController;

use App\Http\Controllers\ApiReportController;





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




Route::post('/login', [ApiLoginController::class, 'login'])
->name('login');

Route::get('/json/categories/', [ApiUiController::class, 'categoryjson']);
Route::get('/json/categories/{category}', [ApiUiController::class, 'jsoncategory']);
Route::get('/categories/{slug}/{category}', [ApiUiController::class, 'categorypage']);



Route::group(['middleware'=>['auth:sanctum']],function(){







    
// update category
Route::post('/categories_update/{category}', [ApiCateogryController::class, 'update'])->name('category_update');
// delete category 
Route::post('/categories_delete/{category}', [ApiCateogryController::class, 'delete'])->name('category_delete');
// save category
Route::post('/categories_save', [ApiCateogryController::class, 'save'])->name('categories_save');

// save product 
Route::post('/save_products', [ApiProductController::class, 'products'])->name('save_products');
// update product
Route::post('/update_data_product/{product}', [ApiProductController::class, 'update'])->name('update_data_product');

// delete product
Route::get('/delete_product/{product}', [productController::class, 'delete'])->name('delete_product');



});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
