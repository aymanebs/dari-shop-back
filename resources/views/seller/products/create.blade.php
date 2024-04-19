@extends('layouts.seller-dashboard')
@section('title', 'Users')
@section('content')
    </header>

    {{-- <div class="h-100  dark:bg-gray-900 rounded shadow-lg p-4 md:p-8 mb-6">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="seller_id" value="{{ Auth::user()->seller->id }}">

                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600 dark:text-gray-400">
                        <p class="font-medium text-lg">Détails du produit</p>
                        <p>Veuillez remplir tous les champs</p>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="name">Nom du produit</label>
                                <input type="text" name="name" id="name"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300"
                                    value="" />
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-3">
                                <label for="price">Prix du produit</label>
                                <input type="number" name="price" id="price"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300"
                                    placeholder="0.00" step="1" />
                                @error('price')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="stock">Quantité</label>
                                <input type="number" name="stock" id="stock"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300"
                                    placeholder="00" step="1" />
                                @error('stock')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Add select field for categories -->
                            <div class="md:col-span-5">
                                <label for="category">Catégorie</label>
                                <select name="category_id" id="category"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Add field to submit an image -->
                            <div class="md:col-span-5">
                                <label for="image">Image du produit</label>
                                <input type="file" multiple name="images[]" id="image"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300"
                                    accept="image/*" />
                                @error('image')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Add description field -->
                            <div class="md:col-span-5">
                                <label for="description">Description du produit</label>
                                <textarea name="description" id="description"
                                    class="h-30 border mt-1 rounded px-4 w-full bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300"></textarea>
                                @error('description')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-5 text-center">
                                <button
                                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

               
            </form>
        </div> --}}

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Forms
            </h2>
            <!-- CTA -->
            <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="https://github.com/estevanmaito/windmill-dashboard">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>Star this project on GitHub</span>
                </div>
                <span>View more &RightArrow;</span>
            </a>

            <!-- General elements -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Elements
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="seller_id" value="{{ Auth::user()->seller->id }}">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input type="tex" name="name" id="name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="0.00" step="1" />
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Price</span>
                    <input type="number" name="price" id="price"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="price" />
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Stock</span>
                    <input type="number" name="stock" id="stock"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="stock" />
                    @error('stock')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </label>


                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Select a category
                    </span>
                    <select name="category_id" id="category"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Image</span>
                    <input type="file" multiple name="images[]" id="image"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input"
                        accept="image/*" />
                    @error('image')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                    <textarea name="description" id="description"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Enter some long form content."></textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </label>
                
                <label class="block mt-4 text-sm">
                    <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </label>
                </form>

            </div>

    </main>

@endsection
