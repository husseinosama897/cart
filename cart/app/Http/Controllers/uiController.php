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

        $category = category::select(['id','name','image'])->get()->take(20);

        return view('front.home')->with(['suppliers'=>$suppliers,'categories'=>$category]);
    }


   public function supplierpage($slug, supplier $supplier){

       return view('front.suppliers.supplier')->with('supplier', $supplier);
   }

   public function categorypage(category $category){

    return view('front.category')->with('category',$category);
}


   public function jsonsupplier(request $request, supplier $supplier){

 $data =    $supplier->product();


 $category = json_decode($request->category,true);
 if($category){
    $data = $data->category()->WhereIn('id',$category);
 }

$data = $data->paginate(10);

return response()->json(['data'=>$data]);
    
   }


   public function jsoncategory(request $request,category $category){

    $data =    $supplier->product();

    $supplier = json_decode($request->supplier,true);
    if($supplier){
       $data = $data->supplier()->WhereIn('id',$category);
    }
   
   $data = $data->paginate(10);
   
   return response()->json(['data'=>$data]);
       
   
      }

      
   public function item($slug,product $product){

$related =  product::where('id','!=',$product->id)->select(['name','slug','img'])->get()->take(10);

return view('front.products.view')->with(['product'=>$product,'related'=>$related]);

}

}
