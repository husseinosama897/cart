<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class completeorderController extends Controller
{
    public function checkout(){
        return view('checkout');
    }

    public function finishing(){
        return view('finishing');
           }
        
        public function checker(request $request){
          return response()->json(['data'=>$request->token]);
        }

        
        

}
