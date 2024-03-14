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
            "name" => "Alimentaion"
        ],

        [
            "name" => "Artisanat "
        ],

        [
            "name" => "Produits de beauté"
        ],

        [
            "name" => "Textiles"
        ],

        [
            "name" => "Produits de beauté"
        ],

       ];

       foreach($categories as $category) {
            Category::Create($category);
       }
       
    }

    
}
