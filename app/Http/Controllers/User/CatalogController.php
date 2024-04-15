<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function alimentation()
    {
        $category = Category::where('name', 'Alimentaion')->first();
      
        $products = $category->products()->get(); 
       
        return view('catalog.alimentation',compact('products'));
    }

    public function beaute()
    {
        $category = Category::where('name', 'Produits de beaute')->first();
      
        $products = $category->products()->get(); 
       
        return view('catalog.produit_beaute',compact('products'));
    }

    public function textiles(){

        $category = Category::where('name','Textiles')->first();
        $products = $category->products()->get();
        return view('catalog.textiles',compact('products'));
    }

    public function decoration(){
            
            $category = Category::where('name','Decoration Interieure')->first();
            $products = $category->products()->get();
            return view('catalog.decoration',compact('products'));
    }

    public function artisanat(){
                
                $category = Category::where('name','Artisanat')->first();
                $products = $category->products()->get();
                return view('catalog.artisanat',compact('products'));
    }
}
