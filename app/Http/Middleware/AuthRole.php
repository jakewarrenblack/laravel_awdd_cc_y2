<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // ... = spread operator (one or many of these, saying it could be just one or could be loads)
     public function handle(Request $request, Closure $next, ...$roles)
    {
        // Middleware should check current role on login, see if they have a role, let them continue to the right place if they do

        // Check if the request has a user object, check the role if so
        // AuthorizeRoles method means we can pass one or many, it will handle it
        // So we might use this middleware to check a range of roles such as admin, superuser, moderator, etc.
        if(!$request->user() || !$request->user()->authorizeRoles($roles)){
            // If user does not have passed in role, redirect to the 'home' route
            return redirect()->route('home');
        }
        
        // If no user, continue
        return $next($request);
    }
}
