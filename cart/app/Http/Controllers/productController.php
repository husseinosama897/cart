<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\supplier;

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
$this->validate($request,[
  'name'=>['string','required','max:255'],
  'price'=>['numeric','required'],
'qty_type'=>['numeric','digits_between:1,9'],
    'qty'=>['numeric'],
 'discount'=>['numeric'],
  'offer'=>['numeric'],
  
'category_id'=>['numeric','required'],
'supplier_id'=>['numeric','required'],
'image'=>[ 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']
]);

$slug = SlugService::createSlug(product::class, 'slug', $request->name);

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
    'image'=>$fileName,
    'category_id'=>$request->category_id,
    'supplier_id'=>$request->supplier_id,
  
]);


   }

   public function update(request $request,product $product){
   
    $this->validate($request,[
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

      
      $product->update([
          'name'=>$request->name,
          'price'=>$request->price,
        'qty_type'=>$request->qty_type,
        'image'=>$fileName,
            'qty'=>$request->qty,
         'discount'=>$request->discount,
          'offer'=>$request->offer,
        'category_id'=>$request->category_id,
        'supplier_id'=>$request->supplier_id,
      ]);

      
   }



   public function delete(product $product){
$product->delete();

   }
}
