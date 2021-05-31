<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function Index(){
        if (Auth::check()) {
            // logged-in

            return view('fontend.contact')->with('user', Auth::user());
        } else {
            // not logged-in

            return view('fontend.contact');
        }
    }
}
