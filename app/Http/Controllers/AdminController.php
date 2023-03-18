<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function home(){

        return view('admin.index');
    }
    public function profile(){
        $id=Auth::user()->id;
        $data=User::find($id);
        return view('admin.profile',compact('data'));
    }
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('role')->get();
        return view('admin.user.show_user',compact('user'));
    }


    public function create(Request $req)
    {
        $roles=Role::all();
        return view('admin.user.add_user',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
       $this->validate($req,[
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'pass'=>'required|min:6'
        ]);
        $user=new user;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->pass);
        $user->save();
        return redirect()->route('user.index')->with('status','Account Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::with('role')->find($id);
        $roles=Role::all();
        return view('admin.user.edit_user',compact('data','roles'));
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
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'pass'=>'required|min:6'
        ]);
        $user=user::find($id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->pass);
        $user->save();
        return redirect()->route('user.index')->with('status','Account Updated Successfully');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user=User::find($id);
       $user->delete();
       return redirect()->route('user.index')->with('status','Account Deleted Successfully');
    }
}
