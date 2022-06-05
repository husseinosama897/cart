<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\supplier;
class ApisupplierController extends Controller
{
    
public function getselectboxsupp(request $request){
  //// function for auto complete
  $this->validate($request,[
    'name'=>['string','max:255','required'],
  ]); 
    $supplier = supplier::query();
    
    
    $supplier =  $supplier->where('customer_name', 'LIKE', '%' . $request->name . '%');
    
  
  $supplier = $supplier->orwhere('comp', 'LIKE', '%' . $request->name . '%');
  
    
  
    $supplier =  $supplier->get()->take(3);
  
    return response()->json(['data'=>$supplier]);
    
    
   }

   public function createsupp(request $request ){

    $this->validate($request,[
      
   
     'comp'=>['string','max:255'],
 
      
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
    
    if($request->image){
      $image_tmp = $request->image;
  
          $extension = $image_tmp->getClientOriginalExtension();
          $fileName = rand(111,99999).'.'.$extension;
          $image_tmp->move('uploads/supplier', $fileName);
    
    }else{
      $fileName = null;
    }
    $slug = SlugService::createSlug(supplier::class, 'slug', $request->name);
    supplier::create([
        'image'=>$fileName,
      'slug'=>$slug,
    'comp'=>$request->name,
        'postal_code'=>$request->postal_code,
        'building_num'=>$request->building_num,
        'street_name'=>$request->street_name,
    'tax_number'=>$request->tax_number,
    'country'=>$request->country,
    
    'phone'=>$request->phone,
    'location'=>$request->location,
    'city'=>$request->city,
    'email'=>$request->email,
    ]);
    
return response()->json(['succ_message'=>'done'],201);
        }


        public function suppliertable(){
            $suppliers = supplier::paginate(10);
         return response()->json(['data'=>$suppliers]);
           }

           public function supplierselex(){
               // suppliers data for select box
            $supplier =  supplier::get()->chunk(10);
            return response()->json(['data'=>$supplier]);
          }
          

          public function delete(supplier $supplier){
      // delete supplier 
            $supplier->delete();

            return response()->json(['succ_message'=>'done'],201);


          }
          public function updatesupp(request $request,supplier $supplier ){
        
            
            $this->validate($request,[
              'personal'=>['numeric','digits_between:1,2'],
            'country'=>['string','max:255'],
           'name'=>['string','max:255'],
       
         'tax_number'=>['string','max:255'],
           'postal_code'=>['string','max:255'],
           'building_num'=>['string','max:255'],
           'street_name'=>['string','max:255'],
       'tax_number'=>['string','max:255'],
       
      
       'phone'=>['string','max:255'],
       'location'=>['string','max:255'],
       'city'=>['string','max:255'],
      
       'email'=>['string','max:255'],
          ]);
                        
          $slug = SlugService::createSlug(category::class, 'slug', $request->comp);
                        $supplier->update([
                          'personal'=>$request->personal,
                'slug'=>$slug,
                        'comp'=>$request->name,
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
