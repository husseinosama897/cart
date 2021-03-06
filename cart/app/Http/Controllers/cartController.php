<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\coupon;
use Session;
use App\Models\product;
use App\jobs\UpdateCoupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class cartController extends Controller
{




public function cartpage(){
    $session_id = Session::get('session_id');
    if(auth()->user() &&  auth()->user()->cart()->count() > 0 || cart::where('session_id',$session_id)->count() > 0 ){
        if(Auth::id()){
            $data = auth()->user()->cart()->with('product')->get();
            }else{
                
                if(!$session_id){
                    $session_id = Str::random(40);
                    Session::put('session_id',$session_id);
                }
          $data = cart::where('session_id', $session_id)->with('product')->get();
    
        }

        
        $code = session()->get('coupon')['name'] ?? null; 
        $discount= session()->get('coupon')['discount'] ?? null; 
        $value = session()->get('coupon')['value'] ?? null;
        $type = session()->get('coupon')['type'] ?? null;
        $percent_off = session()->get('coupon')['percent_off'] ?? null;

        return view('front.cart.index')->with(['data'=>$data,
      'code'=>  $code,
      'discount'=>  $discount,
      'value'=>     $value,
      'type'=>  $type,
      'percent_off'=>  $percent_off
    ]);
    
    }else{
        return redirect()->route('welcome');
    }
  
}



    public function counter(){
        if(auth::id()){
        $count =    auth::user()->cart()->count();
        
        }else{
        
            $session_id = Session::get('session_id');
            if(!$session_id){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);
            
        }
        $count = cart::where('session_id',$session_id)->count();
        
        }
        
        
        
        return response()->json(['data'=>$count]);
        
        }

    
public function delete(cart $cart){
    if(auth::id() && $cart->user_id == auth::id()){
        $cart->delete();
        $this->updatedis();
    }else{
        $session_id = Session::get('session_id');
        if($session_id && $session_id == $cart->session_id){
            $cart->delete();
            $this->updatedis();
        }
        
    }


}

    
public function couponsstore(Request $request){
    
        $coupon = coupon::where('code', $request->code)->first();
        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }
     else{
    dispatch_now(new UpdateCoupon($coupon));
}
$code = session()->get('coupon')['name'] ?? null; 
$discount= session()->get('coupon')['discount'] ?? null; 
$value = session()->get('coupon')['value'] ?? null;
$type = session()->get('coupon')['type'] ?? null;
$percent_off = session()->get('coupon')['percent_off'] ?? null;
return response()->json(['code'=>$code,'discount'=>$discount,'type'=>$type,'value'=>$value,'percent_off'=>$percent_off]);
}

public function store(request $request,product $product){

        if(auth::id()){
            $cart = auth()->user()->cart()
            ->where('product_id',$product->id)->first();
            $count= auth()->user()->cart()->count();   
        }else{
            $session_id = Session::get('session_id');
            if(!$session_id){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);
            }
      $cart = cart::where(['session_id'=>$session_id,'product_id'=>$product->id])->first();
                $count= cart::where('session_id',$session_id)->count();   
              
        }


if($count > 30){
    return response()->json(['error'=>'done']);
}

 
if($cart){
    $cart->quantity +=1;
    $cart->total = $cart->price  *  $cart->quantity ;
    $cart->save();
   $this->updatedis();
}

if(!$cart){
$cart = new cart;
$cart->supplier_id = $product->supplier_id;
$cart->product_id = $product->id ;
$cart->price = $product->price ;
$cart->total = $product->price * 1;
$cart->quantity=1;
if(auth::id()){
    $cart->user_id = auth::id();

}else{
    $session_id = Session::get('session_id');
 
$cart->session_id = $session_id;

}
$cart->save();


$this->updatedis();


}
return response()->json(['msg' => '???? ?????????? ???????????? ?????? ???????? ????????????']);

}

public function updatequantityjson(request $request, cart $cart){

    if($cart){

      $cart->total += $request->quantity  *  $cart->product->price;
      $cart->quantity = $request->quantity;
      $cart->save();
     }

    $this->updatedis();

}


protected function updatedis(){
    $couponName = session()->get('coupon')['name'] ?? null;
    if ($couponName) {
        $coupon = Coupon::where('code', $couponName)->first();
        dispatch_now(new UpdateCoupon($coupon));
    }
    
}


}
