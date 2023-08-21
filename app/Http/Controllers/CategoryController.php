<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
    public function index()
    {
        # code...
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add()
    {
        # code...
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        # code...
        $request->validate([
            'name' => 'required|string'
        ]
        );
        $category = new category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;


        }
        else{
            $category->image = ('download.png'); 
        }
        $category->name = $request->input('name');
        //$category->slug = $request->input('slug');
        $category->slug = Str::slug($request->name);
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        
        $category->save();
        return redirect('/admin/categories')->with('status','category Added Successfully');
    }


    public function edit($id){
        //dd($id);
        $category = category::find($id);

        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        # code...
        $request->validate([
            'name' => 'required|string'
        ]
        );
        $category = category::find($id);
        if($request->hasFile('image')){
            $path ='assets/uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;


        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
       
        $category->update();
        return redirect('/admin/categories')->with('status','category Updated Successfully');
    }
    public function destroy($id){
        $category = category::find($id);
        if($category->image){
            $path ='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/dashboard')->with('status','category Deleted Successfully');
    
    }
}
