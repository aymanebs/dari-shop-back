<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CatalogController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $products = Product::where('status', 2)->get();
        return view('catalog.index', compact('products', 'categories'));
    }

    public function getProducts()
    {
        $products = Product::where('status', 2)->get();
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }

        return response()->json(['products' => $products]);
    }


    public function filterByPrice(Request $request)
    {
        $min = json_decode($request->min);
        $max = json_decode($request->max);

        $products = Product::where('status', 2)->whereBetween('price', [$min, $max])->get();
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }

        return response()->json(['products' => $products]);
    }



    public function productsByCategory(Category $category, Request $request)
    {
       
        $query = Product::where('status', 2)->whereHas('category', function ($query) use ($category) {
            $query->where('id', $category->id);
        });
    
        // Apply price range filter
        if ($request->has(['min', 'max'])) {
            $query->whereBetween('price', [$request->min, $request->max]);
        }
    
        // Apply search filter
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        $products = $query->get();

        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }
    
        // Process products as needed
    
        return response()->json([
            'message' => 'success',
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {

        $keyword = $request->keyword;

        $products = Product::where('status', 2)->where('name', 'like', '%' . $keyword . '%')
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })->get();
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }
        return response()->json([
            'products' => $products,
        ]);
    }

    public function sort()
    {

        $criteria = request()->criteria;
        $direction = request()->direction;
        $products = Product::OrderBy($criteria, $direction)->get();
        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }
        return response()->json([
            'products' => $products
        ]);
    }


    public function filter(Request $request)
    {


        $min = json_decode($request->min);
        $max = json_decode($request->max);
        $category_ids = $request->category_ids;







        if ($request->category_ids && $request->min && $request->max) {
            $products = Product::where('status', 2)
                ->whereBetween('price', [$min, $max])
                ->whereHas('category', function ($query) use ($category_ids) {
                    $query->whereIn('id', $category_ids);
                })->get();
        } elseif ($request->category_ids && $request->min) {
            $products = Product::where('status', 2)
                ->where('price', '>=', $min)
                ->whereHas('category', function ($query) use ($category_ids) {
                    $query->whereIn('id', $category_ids);
                })->get();
        } elseif ($request->category_ids && $request->max) {
            $products = Product::where('status', 2)
                ->where('price', '<=', $max)
                ->whereHas('category', function ($query) use ($category_ids) {
                    $query->whereIn('id', $category_ids);
                })->get();
        } elseif ($request->category_ids) {
            $products = Product::where('status', 2)
                ->whereHas('category', function ($query) use ($category_ids) {
                    $query->whereIn('id', $category_ids);
                })->get();
        } elseif ($request->min && $request->max) {
            $products = Product::where('status', 2)
                ->whereBetween('price', [$min, $max])->get();
        } elseif ($request->min) {
            $products = Product::where('status', 2)
                ->where('price', '>=', $min)->get();
        } elseif ($request->max) {
            $products = Product::where('status', 2)
                ->where('price', '<=', $max)->get();
        } else {
            $products = Product::where('status', 2)->get();
        }

        foreach ($products as $product) {
            $product->image = $product->getFirstMediaUrl('products');
        }




        // Return the response or further process the data
        return response()->json([
            'products' => $products,
            'message' => 'success'
        ]);
    }

    public function showCategory($category)

    {

        $category = Category::where('id', $category)->first();
        $products = Product::where('category_id', $category)->get();
        return view('catalog.category', compact('products', 'category'));
    }
}
