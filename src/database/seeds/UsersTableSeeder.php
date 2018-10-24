<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Staff IT
        User::create([
            'name' => 'Doddy IT',
            'email' => 'doddy@tsp.com',
            'password' => bcrypt('doddy'),
            'level' => 'staff'
        ]);
        // Staff IT
        User::create([
            'name' => 'Bruno IT',
            'email' => 'bruno@tsp.com',
            'password' => bcrypt('bruno'),
            'level' => 'staff'
        ]);
        // Administrator IT
        User::create([
            'name' => 'Administrator IT',
            'email' => 'administrator@tsp.com',
            'password' => bcrypt('administrator'),
            'level' => 'administrator'
        ]);
        // Manager IT
        User::create([
            'name' => 'Manager IT',
            'email' => 'manager@tsp.com',
            'password' => bcrypt('manager'),
            'level' => 'manager'
        ]);
    }
}
