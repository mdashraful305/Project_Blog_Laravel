<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::All();
        return view('admin.show_cat',compact('data'));
    }


    public function create(Request $req)
    {
        $this->validate($req,[
            'cname'=>'required',
            'img' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $cat=new Category();
        
        if($req->file('img')){
            $cat->name=$req->cname;
            $file=$req->file('img');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('category'), $filename);
            $cat->image=$filename;
            $cat->save();
            return redirect()->route('show_cat')->with('status','Category Added Successfully');
        }
        return redirect()->route('add_cat')->with('status','Category Cant Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.add_cat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        return view('admin.edit_cat',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
        $this->validate($req,[
            'cname'=>'required',
            'img' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $cat=Category::find($id);
        
        if($req->file('img')){
            $cat->name=$req->cname;
            $file=$req->file('img');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('category'), $filename);
            $cat->image=$filename;
            $cat->save();
            return redirect()->route('show_cat')->with('status','Category Updated Successfully');
        }else{
            return redirect()->route('add_cat')->with('status','Category Cant Update Successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('show_cat')->with('status','Category Deleted Successfully');
    }
}
