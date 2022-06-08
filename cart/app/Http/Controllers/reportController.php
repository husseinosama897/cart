<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderitem;
use App\Models\coupon;
use App\Models\User;
class reportController extends Controller
{



public function bestcoupon(){
    // the best coupon used 
    return view('admin.reports.bestcoupon');
}


public function jsonbestcoupon(){
$data = coupon::withcount('order')->orderBy('order_count','desc')->paginate(10);
return response()->json(['data'=>$data]);
}
    
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
      




    public function canceledReport(){
        // canceled orders Report   json 
        return view('admin.reports.canceledReport');
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
        $data = $data->orderBy('created_at','desc');

         $data =  $data->paginate(10);
        
        return response()->json(['data'=>$data]);
        

    }

public function  ArrivedOrderReport(){
    // arrived orders report page 
    return view('admin.reports.ArrivedOrder');
}



public function customer_purchases(){
    /// customer purchase counting billing total for user page
    return view('admin.reports.customer_purchases');

}

public function json_customer_purchases(){
/// customer purchase counting billing total for user
 $data =   User::withSum('order','billing_total')
->orderBy('created_at','desc')
 
 ->paginate(10);

return response()->json(['data'=>$data]);

}



public function salesReportpage(){
    // report sales page 
    return view('admin.reports.sales');
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
$data = $data->orderBy('created_at','desc');
 $data =  $data->paginate(10);

return response()->json(['data'=>$data]);


}


public function products_by_supplier(){
//Report of the best selling products_by_supplier page

return view('admin.reports.productsBySupplier');

}


public function newcustomer(){
    //  new customer 
    return view('admin.reports.newcustomer');
}



public function jsonnewcustomer(request $request){

    $data = User::orderBy('created_at','desc')
    ->get()->take(100);
    return response()->json(['data'=>$data]);

}

public function json_products_by_supplier(request $request){


    $order = orderitem::select(['id','order_id','product_id','quantity'])->with(['product'=>function($qe)use($request){
        $qe->select(['id','name','supplier_id']);

            $qe->with(['supplier'=>function($q){
                 $q->select(['comp','id']);
            }]);
            if($request->supplier_id)
{
    $qe->where('supplier_id',$request->supplier_id);
}

return $qe;
        }])->withcount('product');
   
    
    if($request->from){
        $order = $order->where('confirmation_date','>=',$request->from);
    }
    
    if($request->to){
        $order = $order->where('confirmation_date','=<',$request->to);
    }

    $data = $data->orderBy('product_count','desc');
    
     $order =  $order->paginate(10);
    
    return response()->json(['data'=>$order]);
    
}


    public function bestsellerpage(){
// best seller product

        return view('admin.reports.bestseller');
    }
    public function bestsellerjson(request $request){


        
$order = orderitem::select(['id','product_id','quantity'])->with(['product'=>function($qe)use($request){
     return   $qe->select(['id','name']);
    }])->withcount('product');


    $data = $data->orderBy('product_count','desc');
    

    
if($request->from){
    $order = $order->where('confirmation_date','>=',$request->from);
}

if($request->to){
    $order = $order->where('confirmation_date','=<',$request->to);
}

 $order =  $order->paginate(10);

return response()->json(['data'=>$order]);

    }
    
}
