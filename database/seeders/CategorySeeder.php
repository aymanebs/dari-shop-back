<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categories =[

        [
            "name" => "Food"
        ],

        [
            "name" => "Handicrafts "
        ],

        [
            "name" => "Beauty Products"
        ],

        [
            "name" => "Textiles"
        ],

        [
            "name" => "Home Decor"
        ],

        [
            "name" => "Jewelry"
        ]

       ];

       foreach($categories as $category) {
            Category::Create($category);
       }
       
    }

    
}
