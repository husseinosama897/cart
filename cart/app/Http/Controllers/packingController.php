<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
class packingController extends Controller
{
    public function index(){
        return view('front.packing.index');
    }
    public function newpackaging(){
        return view('front.packing.create');
    }



    public function getCup(request $request){

        $this->validate($request,[
            'name'=>['required','string','max:255'],
        ]);
$data = product::where('name', 'LIKE', '%' . $request->name . '%')
->select(['name','image','price','type','id'])->where('type',2)->get()->take(5);

return response()->json(['data'=>$data]);
    }


    public function insertcup(request $request){
$data =  json_decode($request->packing,true);
$rules = [
              
           
    'id' => 'required|exists:products,id',
    'image'=>[ 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']
];

$insrting = [];

foreach($data as $dat){

    $validator = Validator::make($dat,

        $rules

     );
    if ($validator->passes()) {


        if($dat['image']){
            $image_tmp = $dat['image'];
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/attachment', $fileName);
          }else{
            $fileName = null;
          }

$insrting[

]= [
    'product_id'=>$dat['id'],
    'price'=>$dat['price'],
    'quantity'=>$dat['quantity'],
    'total'=>$dat['quantity'] *  $dat['price'],
    'image'=>$fileName,

];

    }

}
$chunkcup = array_chunk($insrting, 10);

foreach($chunkcup as $cup){
    cart::insert($cup);
}


    }

}
