@extends('layouts.seller-dashboard')
@section('title','Users')
@section('content')
</header>
    {{-- <div class="min-h-screen pt-20 bg-gray-100  "> --}}
      <div class="container dark:bg-gray-800 pt-5 px-8 max-w-screen-lg mx-auto flex items-center justify-center bg-red-500">
        <div>
            <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300">Ajouter un produit</h2>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Ici vous pouvez ajouté un produit à votre boutique.</p>
            <div class="bg-white dark:bg-gray-900 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid pt-5 gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600 dark:text-gray-400">
                        <p class="font-medium text-lg">Détails du produit</p>
                        <p>Veuillez remplir tous les champs</p>
                    </div>
    
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                        <input type="hidden" name="seller_id" value="{{Auth::user()->seller->id}}">
    
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="full_name">Nom du produit</label>
                                    <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300" value="" />
                                    @error('name')
                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <div class="md:col-span-3">
                                    <label for="price">Prix du produit</label>
                                    <input type="number" name="price" id="price" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300" placeholder="0.00" step="1" />
                                    @error('price')
                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <div class="md:col-span-2">
                                    <label for="price">Quantité</label>
                                    <input type="number" name="stock" id="stock" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300" placeholder="00" step="1" />
                                    @error('stock')
                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <!-- Add select field for categories -->
                                <div class="md:col-span-5">
                                    <label for="category">Catégorie</label>
                                    <select name="category_id" id="category" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('category_id')
                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <!-- Add field to submit an image -->
                                <div class="md:col-span-5">
                                    <label for="image">Image du produit</label>
                                    <input type="file" name="image" id="image" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300" accept="image/*" />
                                    @error('image')
                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <!-- Add description field -->
                                <div class="md:col-span-5">
                                    <label for="description">Description du produit</label>
                                    <textarea name="description" id="description" class="h-32 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300"></textarea>
                                    @error('description')
                                    <span class="text-red-500 text-xs">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
    
      </div>
    {{-- </div> --}}

@endsection