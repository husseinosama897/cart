<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class categoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function delete(category $category){
    $category->delete();
        }
    public function update(request $request, category $category){

        $this->validate($request,[
        'name'=>['required','string','max:255'],
        'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->image){
            $image_tmp = $request->image;

                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/supplier', $fileName);
        
        }else{
            $fileName = null;
        }
            $slug = SlugService::createSlug(category::class, 'slug', $request->name);
        $category->update([
        'image'=>$fileName,
        'name'=>$request->name,
        'slug'=>$slug,
        ]);

    }


public function save(Request $request){

    
 
    $this->validate($request,[
        'name'=> ['required','string','max:255'],
        'image'=>['image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
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

   
        return redirect()->route('categories_index')->with('success', 'تم إضافة القسم بنجاح');
    }
}
