<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Role();
        $user->name = 'Admin';
        $user->description = 'Admin has full power to this app';
        $user->save();

        $user = new Role();
        $user->name = 'Manager';
        $user->description = 'Manager has full power to this app';
        $user->save();

        $user = new Role();
        $user->name = 'Customer';
        $user->description = 'Customer can only place order agenest member';
        $user->save();


    }
}
