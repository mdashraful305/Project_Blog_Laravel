<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Role::all();
        return view('admin.show_role',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_role');
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
            'rolename'=>'required|unique:roles,name',
        ]);
        $role=new Role();
        $role->name=$req->rolename;
        $role->save();
        return redirect()->route('role.index')->with('status','Role Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id!=0){

            $data=Role::find($id);
            return view('admin.edit_role',compact('data'));
        }
        else
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $this->validate($req,[
            'rolename'=>'required|unique:roles,name',
        ]);
        $role=Role::find($id);
        $role->name=$req->rolename;
        $role->save();
        return redirect()->route('role.index')->with('status','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('status','Role Deleted Successfully');
    }
}
