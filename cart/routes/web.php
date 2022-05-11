<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\packingController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\uiController;
use App\Http\Controllers\completeorderController;
use Illuminate\Support\Facades\Route;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use \App\Models\category;
use Illuminate\Support\Facades\Auth;

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


Route::get('/checker', [completeorderController::class, 'finishing'])->name('checker');


Route::get('/checker2', function (request $request) {
    return response()->json(['data'=>$request]);
})->name('checker2');

Route::get('/checkout', [completeorderController::class, 'checkout']);



Route::get('/json/suppliers/{supplier}', [uiController::class, 'jsonsupplier']);

Route::get('/json/suppliers/', [uiController::class, 'supplierjson']);

Route::get('/suppliers', function () {
       return view('front.suppliers.suppliers');
});

Route::get('/suppliers/{slug}/{supplier}', [uiController::class, 'supplierpage'])->name('suppliers.page');

//category
Route::get('/json/categories/{category}', [uiController::class, 'jsoncategory']);

Route::get('/categories', function () {
       return view('front.home');
});

Route::get('/categories/{slug}/{category}', [uiController::class, 'categorypage']);



//product 

Route::get('/json/product', [uiController::class, 'jsonproduct']);
//Route::get('/products', [uiController::class, 'productpage']);
Route::get('/product/{slug}/{product}', [uiController::class, 'item']);

//home 



/// packing 


Route::get('/packaging', [packingController::class, 'index']);

Route::post('/getCup', [packingController::class, 'getCup']);

Route::post('/insertcup', [packingController::class, 'insertcup']);




//

Route::get('/', [uiController::class, 'homepage']);

//cart 

 Route::get('/basket', [cartController::class, 'cartpage'])->name('basket');



Route::get('/counter', [cartController::class, 'counter']);

Route::delete('/cart/delete/{cart}', [cartController::class, 'delete']);

Route::post('/couponsstore', [cartController::class, 'couponsstore']);

Route::post('/storeincart/{product}', [cartController::class, 'store']);

Route::post('/updatequantityjson', [cartController::class, 'updatequantityjson']);





/*
Route::get('genrate-sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('home'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('category'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

    // get all posts from db
    $categories = category::all();

    // add every post to the sitemap
    foreach ($categories as $category)
    {
        $sitemap->add(URL::to('categories/'.$category->id), $category->updated_at, '1.0', 'daily');
    }

    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder

    return redirect(url('sitemap.xml'));
});
*/
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
