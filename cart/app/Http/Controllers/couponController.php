<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\coupon;
class couponController extends Controller
{
    public function createpage(){
        return view('admin.coupon.create');
    }



    public function post(request $request){
        $this->validate($request,[
            'code'=>['required','max:255','string'],
            'type'=>['required','string'],
            'value'=>['numeric'],
            'percent_off'=>['numeric'],
            'expire'=>['string'],
        ]);

        $coupon = coupon::create([
            'code'=>$request->code,
            'type'=>$request->type, // voucher || percent_off 
            'value'=>$request->value,
            'percent_off'=>$request->percent_off,
            'expire'=>$request->expire,
        ]);


        
    }

    public function updatepage(request $request,coupon $coupon){

    return view('admin.coupon.update')->with('coupon',$coupon);
        
    }

    public function postupdate(request $request)
}
