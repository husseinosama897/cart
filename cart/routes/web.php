<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\packingController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\uiController;
use App\Http\Controllers\completeorderController;
use App\Http\Controllers\ordersAdminController;
use App\Http\Controllers\productnotfoundController;

use App\Http\Controllers\productController;

use App\Http\Controllers\categoryController;

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

Route::post('/saveorder', [completeorderController::class, 'saveorder']);


Route::post('/json/suppliers/{supplier}', [uiController::class, 'jsonsupplier']);

Route::post('/json/suppliers', [uiController::class, 'jsonsuppliers']);

Route::get('/suppliers', function () {
    $category = category::select(['id','name'])->get()->take(20);
     return view('front.suppliers.suppliers')->with('category',$category);
})->name('suppliers');

Route::get('/suppliers/{slug}/{supplier}', [uiController::class, 'supplierpage'])->name('suppliers.page');


//category
Route::get('/categories', function () {
    return view('front.categories.categories');
})->name('categories');


Route::get('/json/categories/', [uiController::class, 'categoryjson']);

Route::get('/json/categories/{category}', [uiController::class, 'jsoncategory']);
Route::get('/categories/{slug}/{category}', [uiController::class, 'categorypage'])->name('categorypage');



//product 

Route::get('/json/product', [uiController::class, 'jsonproduct']);
//Route::get('/products', [uiController::class, 'productpage']);
Route::get('/product/{slug}/{product}', [uiController::class, 'item']);

//home 


//productnotfound
Route::get('findproduct', [uiController::class, 'pna'])->name('pna');

Route::post('productnotfound', [productnotfoundController::class, 'createorder'])->name('productnotfound');

//


/// packing 


Route::get('/packaging', [packingController::class, 'index'])->name('packaging');

Route::post('/getCup', [packingController::class, 'getCup']);

Route::post('/insertcup', [packingController::class, 'insertcup']);

Route::post('/insertnewone/{product}', [packingController::class, 'insertnewone']);

Route::get('/packaging_order', [packingController::class, 'newpackaging'])->name('packaging_order');


//

Route::get('/', [uiController::class, 'homepage'])->name('welcome');

//cart 

 Route::get('/basket', [cartController::class, 'cartpage'])->name('basket');



Route::get('/counter', [cartController::class, 'counter']);

Route::delete('/cart/delete/{cart}', [cartController::class, 'delete']);

Route::post('/couponsstore', [cartController::class, 'couponsstore']);

Route::post('/storeincart/{product}', [cartController::class, 'store']);

Route::post('/updatequantityjson/{cart}', [cartController::class, 'updatequantityjson']);



// profile
Route::get('/profile', function () {
     return view('front.profile');
})->name('suppliers');
//Admin

// start with categories 


// index category 
Route::get('/categories_index', [categoryController::class, 'index'])->name('categories_index');

// create category
Route::get('/categories_create', [categoryController::class, 'create'])->name('categories_create');



// update cateogry
Route::get('/categories_update/{category}', [categoryController::class, 'categories_index_update'])->name('categories_index_update');

Route::post('/categories_update/{category}', [categoryController::class, 'update'])->name('category_update');

// delete category 
Route::get('/categories_delete/{category}', [categoryController::class, 'delete'])->name('category_delete');

Route::post('/categories_save', [categoryController::class, 'save'])->name('categories_save');




//  start with  product
//index table product
Route::get('/product_index', [productController::class, 'index'])->name('products_index');

/// create product 
Route::get('/create_product', [productController::class, 'create'])->name('create_products');

Route::post('/save_products', [productController::class, 'products'])->name('save_products');

// update product
Route::get('/update_product/{product}', [productController::class, 'index_update'])->name('index_update_products');
Route::post('/update_data_product/{product}', [productController::class, 'update'])->name('update_data_product');

// delete product
Route::get('/delete_product/{product}', [productController::class, 'delete'])->name('delete_product');

/// end of product routes 


/////

//supplier

//***
//create supplier
Route::post('/createsupp', [supplierController::class, 'createsupp']);
// for autocomplete supplier
Route::post('/getselectboxsupp', [supplierController::class, 'getselectboxsupp']);

//supplier create page
Route::get('/createpage', [supplierController::class, 'createpage']);


//supplier suppliertable
Route::get('/supplier_table', [supplierController::class, 'suppliertable'])->name('admin.suppliers');


//supplier select box //chunk 
Route::get('/supplierselex', [supplierController::class, 'supplierselex']);

// supplier update
Route::post('/updatesupp/{supplier}', [supplierController::class, 'updatesupp']);

// supplier delete 
Route::post('/deletesupp/{supplier}', [supplierController::class, 'delete']);
///end of supplier routes


//start with order 

// -----------------------------AdminDashboard----------------------------------------//
Route::group(['prefix' => 'admin',], function () {

// -----------------------------Orders----------------------------------------//
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/',[ordersAdminController::class,'index'])->name('index');
        Route::put('/update',[SettingController::class,'update'])->name('update');
    });
});

// read order
Route::get('/revieworder', [ordersAdminController::class, 'revieworder']);

//change status order

Route::post('/changestatus/{order}', [ordersAdminController::class, 'changestatus']);

// json order table 
Route::post('/orderjson', [ordersAdminController::class, 'orderjson']);
//table orders
Route::post('/orders_index', [ordersAdminController::class, 'index']);
///end of orders routes



///




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


