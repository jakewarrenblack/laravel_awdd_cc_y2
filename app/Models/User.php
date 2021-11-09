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
        return $this->belongsToMany('App\Models\Role');
    }
}
