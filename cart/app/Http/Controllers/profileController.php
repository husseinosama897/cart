<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function profile(){

        $data = auth()->user()->with(['order'=>function($q){
            
return $q->with('itemorder');
        
}]);

        return view('front.profile');
    }
}
