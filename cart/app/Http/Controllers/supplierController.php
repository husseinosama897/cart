<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
class supplierController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


public function suppilercount(){
  if(auth()->user()->orderpackage && auth()->user()->orderpackage->date >= date('Y-m-d')){

    $supplier = auth()->user()->orderpackage
    ->supplier()->count();

return response()->json(['data'=>$supplier]);
    

  }
}

public function getselectboxsupp(request $request){

  $supplier = supplier::query();
  
  
  $supplier =  $supplier->where('customer_name', 'LIKE', '%' . $request->name . '%');
  

$supplier = $supplier->orwhere('comp', 'LIKE', '%' . $request->name . '%');

  

  $supplier =  $supplier->get()->take(3);

  return response()->json(['data'=>$supplier]);
  
  
 }

   public function createpage(){
   
      return view('supplier.create');
    
   }


   public function createsupp(request $request ){

      $this->validate($request,[
          'personal'=>['numeric','digits_between:1,2'],
        'country'=>['string','max:255'],
       
       'comp'=>['string','max:255'],
   'customer_name'=>['string','max:255'],
        
     'tax_number'=>['string','max:255'],
      
   

       'postal_code'=>['string','max:255'],
       'building_num'=>['string','max:255'],
       'street_name'=>['string','max:255'],
   'tax_number'=>['string','max:255'],
   'country'=>['string','max:255'],
   'representative'=>['string','max:255'],
   'phone'=>['string','max:255'],
   'location'=>['string','max:255'],
   'city'=>['string','max:255'],

   'email'=>['string','max:255'],
      ]);
      
      
      supplier::create([
          'personal'=>$request->personal,
          
        'customer_name'=>$request->customer_name,
        'status'=>1,
        
      'comp'=>$request->comp,
          'postal_code'=>$request->postal_code,
          'building_num'=>$request->building_num,
          'street_name'=>$request->street_name,
      'tax_number'=>$request->tax_number,
      'country'=>$request->country,
      'representative'=>$request->representative,
      'phone'=>$request->phone,
      'location'=>$request->location,
      'city'=>$request->city,
  
      'email'=>$request->email,
      ]);
      
      return response()->json('done',200);
    
          }
          public function suppliertable(){
           
          return view('supplier.table');
            
          }
          
          public function supplierjson(){
            $supplier =  supplier::paginate(10);
            return response()->json(['data'=>$supplier]);
          }

          public function supplierselex(){
          
            $supplier =  supplier::get()->chunk(10);
          return response()->json(['data'=>$supplier]);
          
          
            
          }
          
          
          public function delete(supplier $supplier){
      
            $supplier->delete();
          }

          public function updatesupp(request $request,supplier $supplier ){
        
            
      $this->validate($request,[
        'personal'=>['numeric','digits_between:1,2'],
      'country'=>['string','max:255'],
     'comp'=>['string','max:255'],
 'customer_name'=>['string','max:255'],  
   'tax_number'=>['string','max:255'],
     'postal_code'=>['string','max:255'],
     'building_num'=>['string','max:255'],
     'street_name'=>['string','max:255'],
 'tax_number'=>['string','max:255'],
 'country'=>['string','max:255'],
 'representative'=>['string','max:255'],
 'phone'=>['string','max:255'],
 'location'=>['string','max:255'],
 'city'=>['string','max:255'],

 'email'=>['string','max:255'],
    ]);
                  
                  
                  $supplier->update([
                    'personal'=>$request->personal,
          
                    'customer_name'=>$request->customer_name,
                    'status'=>1,
                  'comp'=>$request->comp,
                      'postal_code'=>$request->postal_code,
                      'building_num'=>$request->building_num,
                      'street_name'=>$request->street_name,
                  'tax_number'=>$request->tax_number,
                  'country'=>$request->country,
                  'representative'=>$request->representative,
                  'phone'=>$request->phone,
                  'location'=>$request->location,
                  'city'=>$request->city,
              
                  'email'=>$request->email,

                  ]);
                  
                  return response()->json('done',200);
                
                      }

}
