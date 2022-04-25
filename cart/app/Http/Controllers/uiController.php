<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class uiController extends Controller
{
    public function productpage(){
        return view('ui.product');
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
        $suppliers = supplier::get()->select(['id','name','comp','img'])->take(20);

        $suppliers = category::get()->select(['id','name','img'])->take(20);

        return view('ui.homepage')->with(['suppliers'=>$suppliers,'category'=>$category]);
    }


   public function supplierpage(){
       return view('supplier.')
   }
}
