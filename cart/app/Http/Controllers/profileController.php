<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class profileController extends Controller
{
    public function profile(){
 
        $user = Auth::user();

        return view('front.profile', compact('user'));
    }

    public function order(){
 
        $user = Auth::user();


        $orders = $user->order()->with(['itemorder'=>function($q){
            
        }])->get();

       
        return view('front.order')->with(['data'=>$orders]);
    }

    public function invoice( $order){
$data = auth()->user()->order()->with('itemorder')->where('id',$order)->fist();

return view('invoice')->with('data',$data);
    }

}
