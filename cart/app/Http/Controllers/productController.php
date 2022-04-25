<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class productController extends Controller
{
   public function index(){
       return view('product.index');
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

]);

$data = product::insert([
    'name'=>$request->name,
    'price'=>$request->price,
  'qty_type'=>$request->qty_type,
      'qty'=>$request->qty,
   'discount'=>$request->discount,
    'offer'=>$request->offer,
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
      
      $product->update([
          'name'=>$request->name,
          'price'=>$request->price,
        'qty_type'=>$request->qty_type,
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
