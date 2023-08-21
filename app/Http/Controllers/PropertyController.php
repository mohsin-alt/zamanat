<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class PropertyController extends Controller
{
    //
    public function index()
    {
        # code...
        $property = property::all();
        return view('admin.property.index',compact('property'));
    }

    public function add()
    {
        # code...
        $category = Category::all();
        return view('admin.property.add',compact('category'));
    }
    public function insert(Request $request)
    {
        $randString = Str::random(10);
        $mailid = $request->input('client_id');
        $user = strstr($mailid, '@', true);
        $usernew =  User::create([
            'username' => $user,
            'password' => Hash::make($randString),
            'email' => $request->input('client_id'),
            'type' => 0   ]);
        # code...
        $request->validate($this->rules());
        $property = new property();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/property',$filename);
            $property->image = $filename;


        }
        else{
           $property->image = ('download.png'); 
        }
        $property->name = $request->input('name');
        //$property->slug = $request->input('slug');
        $property->slug = Str::slug($request->name);
        $property->cate_id = $request->input('cate_id');
        $property->description = $request->input('description');
        $property->small_description = $request->input('small_description');
        $property->original_price = $request->input('original_price');
        $property->selling_price = $request->input('selling_price');
        $property->tax = $request->input('tax');
        $property->qty = $request->input('qty');
        $property->status = $request->input('status') == TRUE ? '1':'0';
        $property->popular = $request->input('popular') == TRUE ? '1':'0';
        $property->embed_video = $request->input('embed_video');
        $property->client_id = $usernew->id;
        $property->agent_commission = $request->input('agent_commission');
        $property->save();
        return redirect('/admin/properties')->with('status','property Added Successfully');
    }

    protected  function rules()
    {
        # code...
        return [
            'name' => 'required|string',
            'selling_price' => 'nullable',
            'original_price' => 'nullable',
            'tax'=> 'nullable',
            'qty' => 'nullable'
        ];
    }

    public function edit($id){
        $property = property::find($id);
        $category = Category::all();
        return view('admin.property.edit',compact(['property','category']));
    }
    public function update(Request $request,$id)
    {
        # code...
        $request->validate([
            'name' => 'required|string'
        ]
        );
        $property = property::find($id);
        if($request->hasFile('image')){
            $path ='assets/uploads/property'.$property->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/property',$filename);
            $property->image = $filename;


        }
        $property->name = $request->input('name');
        $property->slug = $request->input('slug');
        $property->description = $request->input('description');
        $property->status = $request->input('status') == TRUE ? '1':'0';
        $property->popular = $request->input('popular') == TRUE ? '1':'0';
        $property->embed_video = $request->input('embed_video');
        
        $property->update();
        return redirect('/admin/properties')->with('status','property Updated Successfully');
    }
    public function destroy($id){
        $property = property::find($id);
        if($property->image){
            $path ='assets/uploads/property/'.$property->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $property->delete();
        return redirect('/property')->with('status','property Deleted Successfully');
    
    }

}
