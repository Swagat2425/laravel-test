<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    
    public function __construct() {



    }

    public function dashboard() {

        $blogs = Post::select('id')->where('status', 1)->count();
        $users = User::select('id')->where('status', 1)->count();
        return view('admin.dashboard', compact('blogs', 'users'));
        
    }

}
