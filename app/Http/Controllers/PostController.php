<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id!=0)
            $posts=Post::where('user_id',Auth::user()->id)->paginate(5);
        else
         $posts=Post::paginate(6);

        return view('admin.show_post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $this->validate($req,[
            'title'=>'required',
            'desc'=>'required',
            'img' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $post=new Post();
        if($req->file('img')){
            $post->title=$req->title;
            $post->description=$req->desc;
            $file=$req->file('img');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('/postimg'), $filename);
            $post->image=$filename;
            $post->user_id=Auth::user()->id;
            $post->category_id=$req->cat_id;
            $post->save();
            $post->tags()->attach($req->states);
            
            return redirect()->route('show_post')->with('status','Post Added Successfully');
        }else{
            return redirect()->route('add_post')->with('status','Post Cant Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $cats=Category::All();
        $tags=Tag::All();
        return view('admin.add_post',compact('cats','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::with('tags')->find($id);
        $cats=Category::All();
        $tags=Tag::All();
        return view('admin.edit_post',compact(['post','cats','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $this->validate($req,[
            'title'=>'required',
            'desc'=>'required',
            'img' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $post=Post::find($id);
        if($req->file('img')){
            $post->title=$req->title;
            $post->description=$req->desc;
            $file=$req->file('img');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('/postimg'), $filename);
            $post->image=$filename;
            $post->user_id=Auth::user()->id;
            $post->category_id=$req->cat_id;
            $post->save();
            $post->tags()->sync($req->states);
            return redirect()->route('show_post')->with('status','Post Updated Successfully');
        }else{
            return redirect()->route('add_post')->with('status','Post Cant Update Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        $post->tags()->detach( $post->tags);
        return redirect()->route('show_post')->with('status','Post Deleted Successfully');
    }
}
