<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'contact_number' => '0123456789',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'first_name' => 'Admin Manager',
            'last_name' => 'User',
            'username' => 'adminManager',
            'email' => 'adminmanager@example.com',
            'contact_number' => '0123456789',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);



        // Customer user
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'contact_number' => '0198765432',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}
