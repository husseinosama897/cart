<?php
use App\setting;

function getNumbers()
{

  $tax = 15 / 100;
if(Auth::check()){
$user_id = Auth::user()->id;
$userCart = DB::table('carts')->where(['user_id' => $user_id])->get();     

}else{
  $session_id = Session::get('session_id');
  $userCart = DB::table('carts')->where(['session_id' => $session_id])->get();   
}

$discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
 
    
$total_amount = 0;
$total = 0;
$value =$discount;
foreach($userCart as $item){
   $total_amount = $total_amount + $item->total;

}


if($total_amount - $discount > 0 ){
  $newSubtotal = ( $total_amount - $discount);


}else{
  $newSubtotal = 0;
  $value -= $total_amount;
  
}


  $newTax = $newSubtotal * $tax / 100 ;

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