<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
class ordersAdminController extends Controller
{


public function index(){
    $orders = order::paginate(15);
    return view('admin.orders.index', compact('orders'));
}


public function revieworder(order $order){
    $item = $order->itemorder;
    return view('admin.orders.review')->with(['data'=>$order]);
}


public function changestatus(order $order,request $request){
   
    $order->update(['track_order'=>$request->track_order,
    'delivery_date'=>$request->delivery_date,
    'receive_date'=>$request->receive_date,
    'confirmation_date'=>$request->confirmation_date,
]);


}
    public function orderjson(request $request){

$order = order::query();


if($request->id){
    $order = $order->where('id',$request->id);
}
if($request->billing_name){
    $order = $order->where('billing_name',$request->billing_name);
}
if($request->billing_number){
    $order = $order->where('billing_number',$request->billing_number);
}
if($request->receive_date){
    $order = $order->where('receive_date',$request->receive_date);
}
if($request->delivery_date){
    $order = $order->where('delivery_date',$request->delivery_date);

}

if($request->track_order){
    $order = $order->where('track_order',$request->track_order);

}


$order = $order->paginate(20);


return response()->json(['data'=>$order]);

    }
}
