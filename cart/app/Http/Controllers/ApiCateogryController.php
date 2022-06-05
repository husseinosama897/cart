<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCateogryController extends Controller
{
    public function index()
    {
        $categories = category::get();
        return response()->json(['data'=>$categories]);

    }


    public function categories_index_update(category $category)
    {
        // update category data json

        return response()->json(['category'=>$category]);
    }


    
    public function delete(category $category){
        $category->delete();
       return response()->json(['succ_message'=>'done'],201);
    }



    public function update(request $request, category $category){

        if($request->image){
            $image_tmp = $request->image;

                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/cateogry', $fileName);
        
        }else{
            $fileName = null;
        }
            $slug = SlugService::createSlug(category::class, 'slug', $request->name);
 if($fileName  !== null){
    $category-> image=$fileName;

 }
      
        $category-> name=$request->name;
        $category-> slug=$slug;
$category->save();
       
return response()->json(['succ_message'=>'done'],201);

    }

    public function save(Request $request){

    
        $request->validate([
            'name'=>['required','string','max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    
        if($request->image){
            $image_tmp = $request->image;
        
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/category', $fileName);
          
          }else{
            $fileName = null;
          }
        $slug = SlugService::createSlug(category::class, 'slug', $request->name);
        $category =     category::create([
            'image'=>$fileName,
            'name'=>$request->name,
            'slug'=>$slug,
            ]);
    
            return response()->json(['succ_message'=>'done'],201);
            
        }
    }
    