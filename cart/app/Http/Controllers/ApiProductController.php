<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(){
        $products = product::latest()->paginate(4);
         return response()->json(['data'=>$products]);

    }


    public function create()
    {

        //json for create page
      $categories = category::select(['name','id'])->get();
      $suppliers = supplier::select(['comp','id'])->get();
      
      $data = [

    'categories'=>$categories,
    'suppliers'=>$suppliers,
      ];

      return response()->json(['data'=>$data]);
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
       
    return response()->json(['succ_message'=>'done'],200)
;       
          }
          public function index_update(product $product)
          {
            $categories = category::select(['name','id'])->get();
            $suppliers = supplier::select(['comp','id'])->get();
            
            $data = [
      
          'categories'=>$categories,
          'product'=>$product,
          'suppliers'=>$suppliers,
            ];
      
return response()->json(['data'=>$data]);
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
        
           return response()->json(['succ_message'=>'done'],201);
              
           }
        
           
   public function delete(product $product){
    $product->delete();
return response()->json('success', 'تم حذف المنتج بنجاح بنجاح',201);
   }
   
}
