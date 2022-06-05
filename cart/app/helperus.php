<?php
use App\setting;
use App\Models\cart;
function getNumbers()
{

  $setting = setting::first();

  $tax = $setting->tax / 100;
if(Auth::check()){

$userCart = auth()->user()->cart()->get();     

}else{
  $session_id = Session::get('session_id');
  $userCart = cart::where(['session_id' => $session_id])->get();   
}

$discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
 
    
$total_amount = 0;
$total = 0;
$value =$discount;
foreach($userCart as $item){

  if($item->product->price == $item->price){

    $total_amount = $total_amount + $item->total;


  }else{
    $total_amount = $total_amount + $item->product->price * $item->quantity;
  }
  

}


if($total_amount - $discount > 0 ){
  $newSubtotal = ( $total_amount - $discount);


}else{
  $newSubtotal = 0;
  $value -= $total_amount;
  
}


  $newTax = $newSubtotal * $tax ;

  $newtotal = ($newSubtotal + $newTax );


    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newtotal'=>$newtotal,
        'newSubtotal'=>$newSubtotal,
        'newTax'=>$newTax,
        'total'=>$total,
        'value'=>$value,
        'total_amount'=>$total_amount,
    ]);



  }