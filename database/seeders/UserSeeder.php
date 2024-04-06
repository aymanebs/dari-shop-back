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


        User::create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        
        User::create([
            'email' => 'buyer@mail.com',
            'password' =>bcrypt('12345678')
        ])->customer()->create([    
            'name' => 'Fake buyer',
            'phone' => '123456789',
            'adress' => '123 Main St',
            'region' => 'Souss Massa',
            'city' => 'Agadir',
            'user_id' => 2,
            
        ]);
           
        User::create([
            'email' => 'seller@mail.com',
            'password' => bcrypt('12345678'),
        ])->seller()->create([ 
            'name' => 'Fake seller',
            'phone' => '123456789',
            'adress' => '123 Main St',
            'user_id' => 3,
        ]);   

           
    }
}
