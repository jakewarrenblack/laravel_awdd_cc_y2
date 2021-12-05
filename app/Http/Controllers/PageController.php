<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Each function here represents a page,
    // Each function returns a view

    public function welcome(){
        return view('welcome');
    }
    
    public function about(){
        return view('about');
    }
}
