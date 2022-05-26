<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class profileController extends Controller
{
    public function profile(){
 
        $user = Auth::user();

        $orders = $user->order()->with(['itemorder'=>function($q){
            
        }])->get();


        return view('front.profile')->with(['data'=>$data]);
    }
}
