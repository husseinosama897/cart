<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use Session;
use App\UpdateCoupon;
class cartController extends Controller
{

public function cartpage(){
    if(auth::id()){
        $data =    auth::user()->cart()->paginate(10);
        }else{
            $session_id = Session::get('session_id');
            if(!$session_id){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
        }

      $data =   cart::where('session_id',$session_id)->paginate(10);

    }
     
    
    
    return view('cart.index', $data);

}

    public function coaunter(){
        if(auth::id()){
        $count =    auth::user()->cart()->count();
        
        }else{
        
            $session_id = Session::get('session_id');
            if(!$session_id){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
              
          
        }
        $count = cart::where('session_id',$session_id)->count();
        
        }
        
        
        
        return response()->json(['data'=>$count]);
        
        }

    
public function delete($id){
    if(auth::id()){
        $cart = cart::where(['id'=>$id,
    'user_id'=>auth::id()])->first();
    }else{
        $session_id = Session::get('session_id');
        if(!$session_id){
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
           
        }
        $cart = cart::where(['id'=>$id,'session_id'=>$session_id])->first();
    }

if($cart){    
$cart->delete();

$this->updatedis();
}
return back()->with('success_message', 'done');

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

public function store(request $request){

    $this->validate($request,[
  
        'price'=>['required','digits_between:1,100000000'],
    
        ]);

        if(auth::id()){
            $cart = auth()->user()->cart()->first();
            $count= auth()->user()->cart()->count();   
        }else{
            $session_id = Session::get('session_id');
            if(!$session_id){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
            }
      $cart = cart::where(['session_id'=>$session_id])->first();
                $count= cart::where('session_id',$session_id)->count();   
              
        }


if($count > 30){
    return response()->json(['counter'=>'done']);
}

 
if($cart){
    $cart->quantity +=1;
    $cart->total = $cart->price  *  $cart->quantity ;

    $cart->save();


   $this->updatedis();
}

if(!$cart){
$cart = new cart;

$cart->seller_id = null;
$cart->price = $request->price ;
$cart->total = $request->price ;
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


}

public function updatequantityjson(request $request,cart $cart){

    if($cartz){

      $cart->total += $request->quantity  *   $cart->product->price;
   $cart->qty = $request->quantity;
      $cartz->save();
      return response()->json($cartz);
        
    }
 

}


protected function updatedis(){
    $couponName = session()->get('coupon')['name'] ?? null;
    if ($couponName) {
        $coupon = Coupon::where('code', $couponName)->first();
        dispatch_now(new UpdateCoupon($coupon));
    }
    
}


}
