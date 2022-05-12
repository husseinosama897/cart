<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderitem;
use App\Models\seller_order;
use App\Models\cart;
class completeorderController extends Controller
{
    public function checkout(){
        return view('front.checkout.index');
    }

    public function finishing(){
        return view('finishing');
           }
        
        public function checker(request $request){
          return response()->json(['data'=>$request->token]);
        }


public function saveorder(request $request)
{
  $order = order::create([
 'user_id'=>auth()->user()->id,
  'billing_name'=>$request->billing_name,
'billing_email'=>$request->billing_email,
   'billing_number'=>$request->billing_number,
    'type'=>$request->type,
    'billing_discount_code'=>getNumbers()->get('code'),
    'billing_subtotal'=>getNumbers()->get('newSubtotal'),
    'billing_total'=>getNumbers()->get('newtotal'),
    'billing_tax'=>getNumbers()->get('newTax'),
  ]);

$cart =  auth()->user()->cart()->with('product');
$orderitemarray = [];
foreach($cart as $car){
   $seller =  $order->seller()->where('seller_id',$car->seller_id)->first();
  if(!empty($seller)){

    if($request->image){
      $image_tmp = $request->image;
          $extension = $image_tmp->getClientOriginalExtension();
          $fileName = rand(111,99999).'.'.$extension;
          $image_tmp->move('uploads/packaging', $fileName);
    
    }else{
      $fileName = null;
    }

    $orderitemarray [ ] = [
      'product_id'=>$car->product_id,
      'seller_order_id'=>$seller->id,
  'user_id'=>auth()->user()->id,
    'type'=>$car->type,
     'image'=>$fileName,
      'status'=>0,
    'amount'=>$car->price,
      'quantity'=>$car->quantity,
    ];

  }else{
   $seller =  seller_order::create([
     'seller_id'=>$seller->id,
     'order_id'=>$order->id,
    ]);
  
    $orderitemarray [ ] = [
      'product_id'=>$car->product_id,
      'seller_order_id'=>$seller->id,
  'user_id'=>auth()->user()->id,
    'type'=>$car->type,
     'image'=>$fileName,
      'status'=>0,
    'amount'=>$car->price,
      'quantity'=>$car->quantity,
    ];
  }

}

$chunkitem = array_chunk($orderitemarray, 10);
foreach($chunkitem as $items){
  orderitem::insert($items);
}

}
        
        

}
