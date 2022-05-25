<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\supplier;

class uiController extends Controller
{



    public function productpage(){
        return view('front.home');
    }



   

    public function jsonproduct(request $request){

$data = product::query();
 $category = json_decode($request->category,true);
 $suppliers  = json_decode($request->suppliers,true);
if(!empty($category)){
    $data =  $data->Wherein('category_id',$category);

}

 if(!empty($suppliers)){
    $data =  $data->Wherein('category_id',$suppliers);

 }




 $data =  $data->paginate(10);

 return response()->json(['data'=>$data]);

    }


    public function homepage(){
        $suppliers = supplier::select(['id','dis','slug','comp','img'])->get()->take(20);

        $category = category::select(['id','name','image','slug'])->get()->take(20);

        return view('front.home')->with(['suppliers'=>$suppliers,'categories'=>$category]);
    }


   public function supplierpage($slug, supplier $supplier){
      $category = category::select(['id','name'])->get()->take(20);

       return view('front.suppliers.supplier')->with(['supplier'=> $supplier,'category'=>$category]);
   }

   public function categorypage($slug, $category){
      $getCategory = category::where('id', $category)->where('slug', $slug)->with('product')->first();
      return view('front.categories.productCategory')->with('category', $getCategory);
   }



   public function jsonsuppliers(request $request){

   
      $data = supplier::query();
      if($request->category){
 
        $data = $data->category()->WhereIn('id',explode(",",$request->category));
      }

    

      $data = $data->paginate(10);

      return response()->json(['data'=>$data]);
    
   }


   public function jsonsupplier(request $request, supplier $supplier){

      $category = $request->category;
  
      $data = $supplier;

      $data =    $data->product();
      if($request->category){
         $data = $data->category()->WhereIn('id',explode(",",$request->category));
       }
 
      $data = $data->paginate(10);

      return response()->json(['data'=>$data]);
    
   }


 
   public function categoryjson(){
      $category =  category::paginate(10);
      
      return response()->json(['data'=>$category]);
   }

   public function jsoncategory(request $request, category $category){

    $data =    $supplier->product();

    $supplier = json_decode($request->supplier,true);
    if($supplier){
       $data = $data->supplier()->WhereIn('id',$category);
    }
   
   $data = $data->paginate(10);
   
   return response()->json(['data'=>$data]);
      
   }

      
   public function item($slug, product $product){
      $related =  product::where('id','!=', $product->id)->select(['name','slug','img', 'id', 'price'])->get()->take(10);

      return view('front.products.view')->with(['product'=>$product, 'related'=>$related]);
   }
   public function pna()
   {
      return view('front.products.productsNotAvailable');
   }

}
