<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    public function index(){
        $data=Post::with('category','tags','user')->paginate(6);
        return view('index',compact('data'));
    }
}
