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
use App\Http\Controllers\couponController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\reportController;



use Laravel\Sanctum\PersonalAccessToken;

use Illuminate\Support\Facades\Route;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use \App\Models\supplier;
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

//report 
  
/// the besties coupon page 





Route::get('/bestcoupon', [reportController::class, 'bestcoupon'])
->name('bestcoupon');

// the besties coupon 
Route::get('/jsonbestcoupon', [reportController::class, 'jsonbestcoupon'])
->name('jsonbestcoupon');





// canceled orders report json 
Route::get('/ArrivedOrderReport', [reportController::class, 'ArrivedOrderReport'])
->name('ArrivedOrderReport');

 // canceled orders Report   json 

Route::post('/jsonArrivedOrderReport', [reportController::class, 'jsonArrivedOrderReport'])
->name('jsonArrivedOrderReport');




// canceled orders report json 
Route::post('/jsoncanceledOrderReport', [reportController::class, 'jsoncanceledOrderReport'])
->name('jsoncanceledOrderReport');

 // canceled orders Report   json 

Route::get('/canceledReport', [reportController::class, 'canceledReport'])
->name('canceledReport');



// sales Report page
  Route::get('/salesReportpage', [reportController::class, 'salesReportpage'])
->name('salesReportpage');

/// json_Rportsales

Route::post('/jsonRportsales', [reportController::class, 'jsonRportsales'])
->name('jsonRportsales');


//customer_purchases

Route::get('/json_customer_purchases', [reportController::class, 'json_customer_purchases'])
->name('json_customer_purchases');

// customer_purchases page

Route::get('/customer_purchases', [reportController::class, 'customer_purchases'])
->name('customer_purchases');


//// Report of the best selling products_by_supplier page

Route::get('/products_by_supplier', [reportController::class, 'products_by_supplier'])
->name('products_by_supplier');


// json Report of the best selling products_by_supplier page
Route::get('/json_products_by_supplier', [reportController::class, 'json_products_by_supplier'])
->name('json_products_by_supplier');

/// bestsellerpage
//json
Route::post('/bestsellerjson', [reportController::class, 'bestsellerjson'])
->name('bestsellerjson');

//page
Route::get('/bestsellerpage', [reportController::class, 'bestsellerpage'])
->name('bestsellerpage');



/// newcustomers
Route::get('/newcustomers', [reportController::class, 'newcustomer'])
->name('newcustomer');



///json_newcustomer
Route::get('/jsonnewcustomer', [reportController::class, 'jsonnewcustomer'])
->name('jsonnewcustomer');


/////////

Route::get('/checker', [completeorderController::class, 'finishing'])->name('checker');

Route::get('/checker2', function (request $request) {
    return response()->json(['data'=>$request]);
})->name('checker2');

Route::get('/checkout', [completeorderController::class, 'checkout']);

Route::post('/saveorder', [completeorderController::class, 'saveorder']);




Route::get('/completeorder/{order}', [completeorderController::class, 'completeorder']);




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



//profile
Route::get('/profile', [profileController::class, 'profile']);

Route::get('/order', [profileController::class, 'order']);

Route::get('/invoice/{order}', [profileController::class, 'invoice'])->name('invoice');


//productnotfound
Route::get('findproduct', [uiController::class, 'pna'])->name('pna');
//create product notfound
Route::post('productnotfound', [productnotfoundController::class, 'createorder'])->name('productnotfound');

//json for product notfound
Route::get('json_productnotfound', [productnotfoundController::class, 'json_productnotfound'])->name('json_productnotfound');
//table for product notfound
Route::get('table_product_notfound', [productnotfoundController::class, 'tableproductfound'])->name('tableproductfound');


//


/// packing 


Route::get('/packaging', [packingController::class, 'index'])->name('packaging');

Route::post('/getCup', [packingController::class, 'getCup']);

Route::post('/insertcup', [packingController::class, 'insertcup']);

Route::post('/insertnewone/{product}', [packingController::class, 'insertnewone']);

Route::get('/packaging_order', [packingController::class, 'newpackaging'])->name('packaging_order');



Route::get('/jsonpackging', [uiController::class, 'jsonpackging'])->name('jsonpackging');


//

Route::get('/', [uiController::class, 'homepage'])->name('welcome');

//cart 

 Route::get('/basket', [cartController::class, 'cartpage'])->name('basket');

Route::get('/counter', [cartController::class, 'counter']);

Route::delete('/cart/delete/{cart}', [cartController::class, 'delete']);

Route::post('/couponsstore', [cartController::class, 'couponsstore']);

Route::post('/storeincart/{product}', [cartController::class, 'store']);

Route::post('/updatequantityjson/{cart}', [cartController::class, 'updatequantityjson']);




//Admin

// coupon
Route::prefix('coupon')->name('coupon.')->group(function () {
    Route::get('/index',[couponController::class,'index'])->name('index');
    Route::get('/create',[couponController::class,'createpage'])->name('create');
    Route::post('/save',[couponController::class,'post'])->name('save');
    Route::get('/edit/{coupon}', [couponController::class, 'updatepage'])->name('coupon.edit');
    Route::post('/update{coupon}',[couponController::class,'postupdate'])->name('update');
});

// start with categories 


// index category 
Route::get('/categories_index', [categoryController::class, 'index'])->name('categories_index');

// create category
Route::get('/categories_create', [categoryController::class, 'create'])->name('categories_create');


// update cateogry
Route::get('/categories_update/{category}', [categoryController::class, 'categories_index_update'])->name('categories_index_update');

Route::post('/categories_update/{category}', [categoryController::class, 'update'])->name('category_update');

// delete category 
Route::post('/categories_delete/{category}', [categoryController::class, 'delete'])->name('category_delete');

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
Route::post('/createsupplier', [supplierController::class, 'createsupp'])->name('createsupplier');

// for autocomplete supplier
Route::post('/getselectboxsupp', [supplierController::class, 'getselectboxsupp']);


//supplier create page
Route::get('/supplier_create_page', [supplierController::class, 'createpage'])->name('admin.suppliers.create');


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
Route::get('/revieworder/{order}', [ordersAdminController::class, 'revieworder'])->name('admin.revieworder');

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


