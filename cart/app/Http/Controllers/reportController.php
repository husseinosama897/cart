<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderitem;
class reportController extends Controller
{



public function bestarea(){

}



    public function bestsellerpage(){
        return view('admin.report.bestseller');
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

 $order =  $order->get()->chunk(100);

return response()->json(['data'=>$order]);

    }
    
}
