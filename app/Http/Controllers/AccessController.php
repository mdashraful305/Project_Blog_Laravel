<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AccessController extends Controller
{
    public function logform(){
        return view('login');
    }
    

    public function signform(){
        return view('register');
    }


    public function register(Request $req){
        $validate=$req->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'pass'=>'required|min:6'
        ]);
        $user=new user;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->pass);
        $user->save();
        return redirect()->route('login')->with('status','Account Created Successfully');

    }

    public function login(Request $req){
        $data=[
            'email'=>$req->email,
            'password'=>$req->pass,
        ];

       if(Auth::attempt($data)){

        return redirect()->route('dashboard');
       }
       else{

        return redirect()->route('login')->with('status','Invalid Email or Password');
       }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }


}
