<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $users = [
            [
                'name' => 'JoCodes',
                'username' => 'jocodes',
                'devisi' => 'Software Engineer',
                'role' => 'admin',
                "password" => Hash::make('12345678')
            ],
        ];

        foreach ($users as $user) {
            // Generate UUID for user
            $userId = (string) Str::uuid();

            // Insert user data
            DB::table('users')->insert([
                'id' => $userId,
                'name' => $user['name'],
                'username' => $user['username'],
                'devisi' => $user['devisi'],
                'role' => $user['role'],
                'password' => $user['password'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
