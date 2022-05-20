<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productnotfound;
class productnotfoundController extends Controller
{
    public function createorder(request $request){

$this->validate($request,[
    'name'=>['required','string','max:255'],
    'phone'=>['required','string','max:255'],
    'product_name'=>['required','string','max:255'],
    'email'=>['required','string','max:255'],
    'image'=>[ 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']
]);
        productnotfound::insert([
'name'=>$request->name,
'phone'=>$request->phone,
'product_name'=>$request->product_name,
'email'=>$request->email,
'image'=>$fileName,
        ]);



    }
}
