<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // this creates a dynamic property called Roles
    // and then when getting a specific instance of a user
    // we can call $user->roles
    // and it will return an array of all the roles for the user
    // saves us writing any SQL
    // this is all done by the belongsToMany method
    // very handy!! easier than writing it ourselves

    public function roles(){
        // this is a many to many relationship
        // eg many users may have the role of 'admin'

        // so we write a method which returns the result of the 'belongsToMany' method

        // we must also do the inverse of this relationship...
        // as in, a user belongs to many roles
        // but a role also belongs to many users!
        // so we define this too with a second call to belongsToMany
        // we do the other one inside Role

        // note that here we specify the name of the joining table
        // this is because Laravel will guess as to it's name and name it by default
        // but the default naming convention creates these names in alphabetical order
        // so in our case Laravel will call the joining table 'role_user'
        // even though our table is actually called 'user_role'
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }

    // we want to be able to authorise roles
    // so if a user has any valid role, it will return true
    // like this:
    public function authorizeRoles($roles){
        // so with this function, it doesn't matter whether we pass a string or an array,
        // the authorizeRoles function will handle it

        // 1. check if the value passed in is an array
        if(is_array($roles)){
            // if it is, run the hasAnyRole function which takes an array, and return it's value (which will be true or false)
            return $this->hasAnyRole($roles) ||
                // if hasAnyRole returns false, run this part, as in this case the user's role is invalid and this isn't allowed
                abort(401, 'This action is unauthorised!')
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorised!')
    }

    // we will pass an array into this function
    public function hasAnyRole($roles){
        // return true where the name of the role is in the $roles array
        // 'whereIn' checks a *list* of words instead of just one, like we do in the 'hasRole' function
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    // This function will check if we have a specific role
    public function hasRole($role){
        // $this refers to the current user, because we're in the user class
        // so we're checking to see if $this (user) is the same as the string that was passed in

        // so we retrieve the role, where the name of the role is the same as the parameter that we passed into this function

        // 'return null !==' - means return true or false,
        // it says 'is the passed role NOT null? If it isn't null, return true
        return null !== $this->roles()->where('name', $role)->first();
    }
}
