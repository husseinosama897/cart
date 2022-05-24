<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\supplier;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class productController extends Controller
{
   public function index(){
      $products = product::latest()->paginate(4);
       return view('admin.products.index', compact('products'));
   }
   public function create()
   {
     $categories = category::all();
     $suppliers = supplier::all();
     return view('admin.products.create', compact('categories', 'suppliers'));
   }
   public function products(request $request){
 $request->validate([
  'name'=>['string','required','max:255'],
  'price'=>['numeric','required'],
'qty_type'=>['numeric','digits_between:1,9'],
    'qty'=>['numeric'],
 'discount'=>['numeric'],
  'offer'=>['numeric'],
'category_id'=>['numeric','required'],
'supplier_id'=>['numeric','required'],
'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

$slug = SlugService::createSlug(product::class,'slug', $request->name);


if($request->image){
  $image_tmp = $request->image;

      $extension = $image_tmp->getClientOriginalExtension();
      $fileName = rand(111,99999).'.'.$extension;
      $image_tmp->move('uploads/product', $fileName);

}else{
  $fileName = null;
}

$data = product::insert([
    'name'=>$request->name,
    'price'=>$request->price,
    'qty_type'=>$request->qty_type,
    'qty'=>$request->qty,
    'discount'=>$request->discount,
    'offer'=>$request->offer,
    'slug'=>$slug,
    'img'=>$fileName,
    'category_id'=>$request->category_id,
    'supplier_id'=>$request->supplier_id,
  
]);

return redirect()->route('products_index');


   }

   public function index_update(product $product)
   {
      $categories = category::all();
      $suppliers = supplier::all();
      return view('admin.products.update', compact('categories', 'suppliers', 'product'));
   }
   public function update(request $request,product $product){
   
    $request->validate([
        'name'=>['string','required','max:255'],
        'price'=>['numeric','required'],
      'qty_type'=>['numeric','digits_between:1,9'],
          'qty'=>['numeric'],
       'discount'=>['numeric'],
        'offer'=>['numeric'],   
      'category_id'=>['numeric','required'],
      'supplier_id'=>['numeric','required'],
      
      ]);
      
if($request->image){
  $image_tmp = $request->image;

      $extension = $image_tmp->getClientOriginalExtension();
      $fileName = rand(111,99999).'.'.$extension;
      $image_tmp->move('uploads/product', $fileName);

}else{
  $fileName = null;
}

      
      $product->name=$request->name;

      $product->price=$request->price;

      $product->qty_type=$request->qty_type;
if($fileName !== null){
  $product->image=$fileName;
}
     

      $product->qty=$request->qty;
      $product->discount=$request->discount;
      $product->offer=$request->offer;
      $product->category_id=$request->category_id;
      $product->supplier_id=$request->supplier_id;
      $product->save();

      return redirect()->route('products_index');

      
   }



   public function delete(product $product){
    $product->delete();
    return redirect()->route('products_index')->with('success', 'تم حذف المنتج بنجاح بنجاح');
   }
}
