<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // note that this file is assuming 'admin' and 'user' roles exist within the DB
    public function run()
    {
        // we get the admin role and store it within this var
        // and then we attach this value to the $admin object
        // 'where' is a quick way of doing some SQL
        // same as writing
        // SELECT * FROM roles WHERE 'name' = 'admin'
        // without the 'first' method it might retrieve an array
        // we only want one, so just retrieve the first one we find
        $role_admin = Role::where('name', 'admin')->first();
        // do the same for a normal user role
        $role_user = Role::where('name', 'user')->first();


        // User object is named 'admin'
        // this in itself does not make this User an admin
        $admin = new User();
        $admin->name = 'Joe Bloggs';
        $admin->email = 'admin@example.com';
        // we don't want to store the password in plaintext
        $admin->password = Hash::make('secret');
        $admin->save();
        // immediately after user creation, we attach the role,
        // this is what ties them together
        // we do it after the user is created,
        // *because* this won't work unless the user already exists in the DB
        // the 'attach' method requires this!!
        $admin->roles()->attach($role_admin);

        // we've made an admin, now make an ordinary user
        $user = new User();
        $user->name = 'Francis Bloggs';
        $user->email = 'user@example.com';        
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
