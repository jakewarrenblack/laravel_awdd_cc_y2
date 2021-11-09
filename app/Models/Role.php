<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // so this allows us to find all the users that have each role
    public function users(){
        // note that here we specify the name of the joining table
        // this is because Laravel will guess as to it's name and name it by default
        // but the default naming convention creates these names in alphabetical order
        // so in our case Laravel will call the joining table 'role_user'
        // even though our table is actually called 'user_role'
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
