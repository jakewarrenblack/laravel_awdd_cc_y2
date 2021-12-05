<?php
// We copy/pasted this in from the original HomeController in the root of the Controllers folder,
// be careful not to copy in the name space and 'use' statements, they're specific to each of these HomeControllers


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $this->middleware('auth');
        $this->middleware('role:admin');        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // note that if we just leave this as 'home' it will take us to the home.blade.php in the root of the views folder
        // we want the admin view, so we use admin.home
        //return view('admin.home');

        // Get the currently authenticated user
        $user = Auth::user();

        // Make sure the user's role is 'admin'
        $user->authorizeRoles("admin");
        return view("admin.home");
    }
}

