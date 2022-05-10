<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
class packingController extends Controller
{
    public function index(){
        return view('packing.index');
    }

    public function getCup(request $request){

        $this->validate($request,[
            'name'=>['required','string','max:255'],
        ]);
$data = product::where('name', 'LIKE', '%' . $request->name . '%')
->select(['name','image','type','id'])->where('type',1)->get()->take(5);

return response()->json(['data'=>$data]);
    }


    
}
