<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create([
            'role_name' => 'USER'
        ]);

        Role::create([
            'role_name' => 'ADMIN'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => Hash::make('ErsTalentAdmin'),
            'phone_number' => '08123456789',
            'gender' => 'P',
            'role_id' => 2,
        ]);


    }
}
