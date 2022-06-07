<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderitem;
use App\Models\seller_order;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use App\Models\bestseller_product;
class completeorderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function checkout(){
      $data = auth()->user()->cart()->with('product')->get();
  
        return view('front.checkout.index')->with(['data'=>$data,
        'total'=>getNumbers()->get('newtotal'),
        'tax'=>getNumbers()->get('newTax'),
      ]);
    }

    public function finishing(){
        return view('finishing');
           }
        
        public function checker(request $request){
          return response()->json(['data'=>$request->token]);
        }


public function saveorder(request $request)
{

  $this->validate($request,[
    'billing_name'=>['string','max:255','required'],
    'billing_email'=>['string','max:255','required','email'],
       'billing_number'=>['numeric','required'],
        'type'=>0,
        'details_address'=>['string','max:255','required'],
        'billing_area'=>['string','max:255','required'],
        'billing_restaurant'=>['string','max:255'],
        'notes'=>['string'],
  ]);
  
  $order = order::create([
 'user_id'=>auth()->user()->id,
  'billing_name'=>$request->billing_name,
'billing_email'=>$request->billing_email,
   'billing_number'=>$request->billing_number,
    'type'=>0,
    'details_address'=>$request->details_address,
    'billing_area'=>$request->billing_area,
    'billing_restaurant'=>$request->billing_restaurant,
    'notes'=>$request->notes,
    'coupon_id'=>session()->get('coupon')['coupon_id'] ?? null,
    'billing_discount_code'=>getNumbers()->get('code'),
    'billing_subtotal'=>getNumbers()->get('newSubtotal'),
    'billing_total'=>getNumbers()->get('newtotal'),
    'billing_tax'=>getNumbers()->get('newTax'),
  ]);

  return view('completeorder')->with('order',$order);
}


public function completeorder(order $order){
 
  $order->update(['confirmed'=>1]);
 
$cart =  auth()->user()->cart()->with('product')->get();
$orderitemarray = [];
foreach($cart as $car){
   $seller =  $order->seller()->where('seller_id',$car->seller_id)->first();

   $fileName = null;

  if(!empty($seller)){

  

    $orderitemarray [ ] = [
      'product_id'=>$car->product_id,
      'seller_order_id'=>$seller->id,
  'user_id'=>auth()->user()->id,
    'type'=>$car->type,
     'image'=>$car->image,
      'status'=>0,
    'amount'=>$car->price,
      'quantity'=>$car->quantity,
    ];

  }else{
   $seller =  seller_order::create([
     'seller_id'=>$car->seller_id,
     'order_id'=>$order->id,
    ]);
  
    $orderitemarray [ ] = [
      'product_id'=>$car->product_id,
      'seller_order_id'=>$seller->id,
  'user_id'=>auth()->user()->id,
    'type'=>$car->type,
    'image'=>$car->image,
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
