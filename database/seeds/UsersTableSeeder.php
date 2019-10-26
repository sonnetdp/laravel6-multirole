<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin      = Role::where('name', 'Admin')->first();
        $roleManager    = Role::where('name', 'Manager')->first();
        $roleCustomer   = Role::where('name', 'Customer')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@test.com';
        $admin->password = bcrypt('111111');
        $admin->save();
        $admin->roles()->attach($roleAdmin);
        $admin->roles()->attach($roleManager);

        $manager = new User();
        $manager->name = 'Manager';
        $manager->email = 'manager@test.com';
        $manager->password = bcrypt('111111');
        $manager->save();
        $manager->roles()->attach($roleManager);


        $operator = new User();
        $operator->name = 'Customer';
        $operator->email = 'customer@test.com';
        $operator->password = bcrypt('111111');
        $operator->save();
        $operator->roles()->attach($roleCustomer);
    }
}
