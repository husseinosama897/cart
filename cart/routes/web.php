<?php

use App\Http\Controllers\supplierController;
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

Route::get('/', function () {
 //   $slug = SlugService::createSlug(category::class, 'slug', 'My First Post');
    return view('front.home');
});

Route::get('/json/suppliers/{supplier}', [App\Http\Controllers\uiController::class, 'jsonsupplier']);
Route::get('/suppliers/{slug}/{supplier}', [App\Http\Controllers\uiController::class, 'supplierpage']);

//category
Route::get('/json/categories/{category}', [App\Http\Controllers\uiController::class, 'jsoncategory']);
Route::get('/categories/{slug}/{category}', [App\Http\Controllers\uiController::class, 'categorypage']);



//product 

Route::get('/json/product', [App\Http\Controllers\uiController::class, 'jsonproduct']);
Route::get('/products', [App\Http\Controllers\uiController::class, 'productpage']);
Route::get('/product/{slug}/{product}', [App\Http\Controllers\uiController::class, 'item']);

//home 


Route::get('/home', [App\Http\Controllers\uiController::class, 'homepage']);

//cart 

Route::get('/Basket', [App\Http\Controllers\cartController::class, 'cartpage']);



Route::get('/counter', [App\Http\Controllers\cartController::class, 'counter']);

Route::delete('/cart/delete/{cart}', [App\Http\Controllers\cartController::class, 'delete']);

Route::post('/couponsstore', [App\Http\Controllers\cartController::class, 'couponsstore']);

Route::post('/storeincart', [App\Http\Controllers\cartController::class, 'store']);


Route::post('/storeincart', [App\Http\Controllers\cartController::class, 'store']);

Route::post('/updatequantityjson', [App\Http\Controllers\cartController::class, 'updatequantityjson']);





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
