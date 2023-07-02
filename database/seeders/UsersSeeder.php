<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); 
        $users = [ 
            [ 
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'password',
                'role_id' => '1',
                'status' => '1',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => 'password',
                'role_id' => '2',
                'status' => '1',
            ],
        ];

        foreach($users as $user)
        {
            User::create([
                'name' => $user['name'],
                'role_id' => $user['role_id'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'status' => $user['status'],
            ]);
        }
    }
}
