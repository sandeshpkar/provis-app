<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Sandesh Pangrekar',
                'email' => 'sandesh@example.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Rohit Sharma',
                'email' => 'rohit@example.com',
                'password' => Hash::make('12345678')
            ]
        ];

        foreach($data as $user){

            User::updateOrCreate(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ],
                [
                    'password' => $user['password']
                ],
            );

        }
    }
}
