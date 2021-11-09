<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// we need to import our Role class
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  this variable could be called anything
        $role_admin = new Role();
        // now we need to provide a name and description,
        // because we've defined these in our Role model
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        // the save method is what actually stores these details in the DB
        $role_admin->save();

        // now just doing the same but for an ordinary user
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';        
        $role_user->save();
    }
}
