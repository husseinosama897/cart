<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;


class couponController extends Controller
{
    public function index()
    {
        $coupons = coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }
    public function createpage(){
        return view('admin.coupons.create');
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
        return view('admin.coupons.update')->with('coupon',$coupon);
    }

    public function postupdate(request $request,coupon $coupon){


        $this->validate($request,[
            'code'=>['required','max:255','string'],
            'type'=>['required','string'],
            'value'=>['numeric'],
            'percent_off'=>['numeric'],
            'expire'=>['string'],
        ]);

        $coupon->update([
            'code'=>$request->code,
            'type'=>$request->type, // voucher || percent_off 
            'value'=>$request->value,
            'percent_off'=>$request->percent_off,
            'expire'=>$request->expire,
        ]);




    }

    

}
