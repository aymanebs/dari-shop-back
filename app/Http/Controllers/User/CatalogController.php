<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $products = Product::all();
        return view('catalog.index', compact('products', 'categories'));
    }

    public function getProducts()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }
        return response()->json(['products' => $products]);
    }

    public function alimentation()
    {
        $category = Category::where('name', 'Alimentaion')->first();

        $products = $category->products()->get();

        return view('catalog.alimentation', compact('products'));
    }

    public function beaute()
    {
        $category = Category::where('name', 'Produits de beaute')->first();

        $products = $category->products()->get();

        return view('catalog.produit_beaute', compact('products'));
    }

    public function textiles()
    {

        $category = Category::where('name', 'Textiles')->first();
        $products = $category->products()->get();
        return view('catalog.textiles', compact('products'));
    }

    public function decoration()
    {

        $category = Category::where('name', 'Decoration Interieure')->first();
        $products = $category->products()->get();
        return view('catalog.decoration', compact('products'));
    }

    public function artisanat()
    {

        $category = Category::where('name', 'Artisanat')->first();
        $products = $category->products()->get();
        return view('catalog.artisanat', compact('products'));
    }

    public function filterByPrice(Request $request)
    {
        $min = json_decode($request->min);
        $max = json_decode($request->max);


        $products = Product::whereBetween('price', [$min, $max])->get();
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }

        return response()->json(['products' => $products]);
    }

    public function filterByCategory(Request $request)
    {

        $products = Product::whereHas('category', function ($query) use ($request) {
            $query->whereIn('id', $request->category_ids);
        })->get();
        
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }
        return response()->json([
            'message' => 'success',
            'products' => $products


        ]);
    }
}
