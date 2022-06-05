<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiReportController extends Controller
{
     
    public function jsoncanceledOrderReport(request $request){
        // canceled orders report json 
              $data = order::query();
      
              $data = $data->where('track_order',3);
          

              if($request->from){
                  $data = $data->where('confirmation_date','>=',$request->from);
              }
              
              if($request->to){
                  $data = $data->where('confirmation_date','=<',$request->to);
              }
              
               $data =  $data->paginate(10);
              
              return response()->json(['data'=>$data]);
              
      
          }


          public function jsonArrivedOrderReport(request $request){
            // arrived orders report json 
                  $data = order::query();
          
                  $data = $data->where('track_order',2);
              
                  if($request->from){
                      $data = $data->where('receive_date','>=',$request->from);
                  }
                  
                  if($request->to){
                      $data = $data->where('receive_date','=<',$request->to);
                  }
                  
                   $data =  $data->paginate(10);
                  
                  return response()->json(['data'=>$data]);
                  
          
              }

              public function json_customer_purchases(){
                /// customer purchase counting billing total for user
                 $data =   User::withSum('order','billing_total')->paginate(10);
                
                return response()->json(['data'=>$data]);
                
                }




public function jsonRportsales(request $request){
    //   json Report of the best selling products_by_supplier page

$data = order::query();
    
if($request->from){
    $data = $data->where('confirmation_date','>=',$request->from);
}

if($request->to){
    $data = $data->where('confirmation_date','=<',$request->to);
}

 $data =  $data->paginate(10);

return response()->json(['data'=>$data]);


}

public function jsonnewcustomer(request $request){

    $data = User::get()->orderby('created_at','desc')->take(100);
    return response()->json(['data'=>$data]);

}


public function json_products_by_supplier(request $request){


    $order = order::with(['itemorder'=>function($q)use($request) {

        return $q->select(['id','product_id','quantity'])->with(['product'=>function($qe)use($request){
            $q->select(['id','name','seller_id']);

            if($request->seller_id)
{
    $q->where('seller_id',$request->seller_id);
}

return $q;
        }])->withcount();
    }])->query();
    
    if($request->from){
        $order = $order->where('confirmation_date','>=',$request->from);
    }
    
    if($request->to){
        $order = $order->where('confirmation_date','=<',$request->to);
    }
    
     $order =  $order->paginate(10);
    
    return response()->json(['data'=>$order]);
    
}


public function bestsellerjson(request $request){


        
    $order = order::with(['itemorder'=>function($q)use($request) {
    
        return $q->select(['id','product_id','quantity'])->with(['product'=>function($qe)use($request){
         return   $qe->select(['id','name']);
        }])->withcount();
    }])->query();
    
    if($request->from){
        $order = $order->where('confirmation_date','>=',$request->from);
    }
    
    if($request->to){
        $order = $order->where('confirmation_date','=<',$request->to);
    }
    
     $order =  $order->get()->paginate(10);
    
    return response()->json(['data'=>$order]);
    
        }


        
    }