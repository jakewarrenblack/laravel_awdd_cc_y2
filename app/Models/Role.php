<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // so this allows us to find all the users that have each role
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
