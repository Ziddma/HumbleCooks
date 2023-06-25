<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the admin role if it doesn't exist
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // Create the admin user
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('lol123lol'),
            'role_id' => $userRole->id,
        ]);
    }
}
