<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // This middleware checks that the user is authorised
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // Method runs when user goes to /home
    public function index(Request $request)
    {
        // get currently logged in user
        $user = Auth::user();
        $home = 'home';


        // check if user is admin or user
        if($user->hasRole("admin")){
            $home = 'admin.home';
        }
        else if($user->hasRole("user")){
            $home = 'user.home';
        }

        // if user is neither, send them to generic 'home'
        return redirect()->route($home);
    }
}
