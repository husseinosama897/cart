<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUiController extends Controller
{
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

                // json home page 
                $suppliers = supplier::select(['id','dis','slug','comp','image'])->get()->take(20);
        
                $category = category::select(['id','name','image','slug'])->get()->take(20);
        
$data = [
    'suppliers'=>$suppliers,
    'categories'=>$category,
];


return response()->json(['data'=>$data]);
            }

        

               public function supplierpage($slug, supplier $supplier){

                // supplier page json 
      $category = category::select(['id','name'])->get()->take(20);

     return response()->json(['data'=>$data]);
   }

   public function categorypage($slug, $category){

    // json category page
    $getCategory = category::where('id', $category)->where('slug', $slug)->with('product')->first();
  

    return response()->json(['data'=>$getCategory]);
 }


 public function jsonsuppliers(request $request){
// json suppliers for pages 
   
    $data = supplier::query();
 
    if($request->category && $request->category !== 'all'){
       
      $data = $data->whereHas('category', function($q) use($request){

     return  $q->whereIn('id',$request->category);


      });
      
    
    }

  
    $data = $data->with('category'); // with categories its manytomany

    $data = $data->paginate(10);

    return response()->json(['data'=>$data]);
  
 }



 public function jsonsupplier(request $request, supplier $supplier){
 

    //  json supplier page its collection products belongs the supplier 
 
    $data = $supplier;


    $data =    $data->product();
    if($request->category && $request->category !== 'all'){
       
       $data = $data->whereHas('category', function($q) use($request){

      return  $q->whereIn('id',$request->category);


       });
       
     
     }

    



    $data = $data->paginate(10);

    return response()->json(['data'=>$data]);
  
 }


 public function categoryjson(){

    // its categories pagination for pages 
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
       // item page json && related products 
    $related =  product::where('id','!=', $product->id)->select(['name','slug','img', 'id', 'price'])->get()->take(10);
$data = [
    'related'=>$related,
    'product'=>$product,
];
    return response()-json(['data'=>$data]);
 }



}
