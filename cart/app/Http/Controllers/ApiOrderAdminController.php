<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiOrderAdminController extends Controller
{
    public function index(){
        // json table order
        $orders = order::paginate(10);
       

        return response()->json(['data'=>$orders]);

         
    }


    public function revieworder(order $order){
        $item = $order->itemorder; // items order has MANY
        return response()->json(['data'=>$order]);
        /// json review order page 

    }
    
    public function changestatus(order $order,request $request){
   
        $order->update(['track_order'=>$request->track_order, /// status order [0=>'bending',1=>'out to deliver',2=>'recived',3=>'canceled']
        'delivery_date'=>$request->delivery_date,// when this out to delivery 
        'receive_date'=>$request->receive_date, // received at
        
        'confirmation_date'=>Carbon::now(),
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
