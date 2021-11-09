<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // we use the call method to execute our seeders
        // the documentation shows this in an array,
        // we just do the two separately
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        // the command to run these seeders:
        // ************************
        // php artisan db:seed 
        // ************************
        // - (runs this class)
    }
}
