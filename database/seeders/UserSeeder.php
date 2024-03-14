<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('12345678'),     
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'buyer',
                'email' => 'buyer@mail.com',
                'password' =>bcrypt('12345678')
            ],
            [
                'name' => 'seller',
                'email' => 'seller@mail.com',
                'password' => bcrypt('12345678')
            ]
            ];

            foreach($users as $user){
                User::create($user);
            }
    }
}
