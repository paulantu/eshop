<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function Index(){
        if (Auth::check()) {
            // logged-in

            return view('fontend.blog')->with('user', Auth::user());
        } else {
            // not logged-in

            return view('fontend.blog');
        }
    }
}
