<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\packaging;
use App\Models\coupon;
use Session;
use App\Models\product;

use App\Models\cart;

use App\jobs\UpdateCoupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class packingController extends Controller
{
    public function index(){
        return view('front.packing.index');
    }
    public function newpackaging(){
        if(Auth::id()){
            $data = auth()->user()->packaging()->with('product')->get();
            }else{
                $session_id = Session::get('session_id');
                if(!$session_id){
                    $session_id = Str::random(40);
                    Session::put('session_id',$session_id);
                }
          $data = packaging::where('session_id', $session_id)->with('product')->get();
    
        }

        return view('front.packing.create')->with('data',$data);
    }

public function insertnewone(product $product,$request){

    if(auth::id()){
        $packaging = auth()->user()->packaging()
        ->where('product_id',$product->id)->first();
        $count= auth()->user()->packaging()->count();   
    }else{
        $session_id = Session::get('session_id');
        if(!$session_id){
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
        }
  $packaging = packaging::where(['session_id'=>$session_id,'product_id'=>$product->id])->first();
            $count= packaging::where('session_id',$session_id)->count();   
          
    }


if($packaging){
$packaging->quantity +=1;
$packaging->total = $packaging->price  *  $packaging->quantity ;
$packaging->type = 0 ;
$packaging->save();

}

if(!$packaging){
$packaging = new packaging;
$packaging->supplier_id = $product->supplier_id;
$packaging->type = 0 ;
$packaging->product_id = $product->id ;
$packaging->price = $product->price ;
$packaging->total = $product->price * 1;
$packaging->quantity=1;
if(auth::id()){
$packaging->user_id = auth::id();

}else{
$session_id = Session::get('session_id');
$packaging->session_id = $session_id;

}
$packaging->save();

}



}

    public function getCup(request $request){

        $this->validate($request,[
            'name'=>['required','string','max:255'],
        ]);
$data = product::where('name', 'LIKE', '%' . $request->name . '%')
->select(['name','img','price','supplier_id','type','id'])->where('type',2)->get()->take(5);

return response()->json(['data'=>$data]);
    }


    public function insertcup(request $request){
$data =  $request->packing;


$insrting = [];



$count = 0;
$data = json_decode($data, true);

foreach($data as $dat){
    if($dat['exist_image'] == 1){
    $img = 'files-'.$count;
    }
    $validator = $this->validate($request,[
        $img=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    
    ]

 
        
     

     );
  

    
        if($dat['exist_image'] == 1){
           
            $image_tmp = $request->$img;
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/attachment', $fileName);
          }else{
            $fileName = null;
          }

$insrting[

]= [
    'product_id'=>$dat['product_id'],
    'price'=>$dat['product_price'],
    'supplier_id'=>$dat['supplier_id'],
    'quantity'=>$dat['quantity'],
    'total'=>$dat['quantity'] *  $dat['product_price'],
    'image'=>$fileName,

];

    

}

$chunkcup = array_chunk($insrting, 10);

foreach($chunkcup as $cup){
    
    cart::insert($cup);
}



if(Auth::id()){
    $data = auth()->user()->packaging()->delete();
    }else{
        $session_id = Session::get('session_id');
        if(!$session_id){
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
        }
  $data = packaging::where('session_id', $session_id)->delete();

}
    return response()->json('Hello');
    }

}
