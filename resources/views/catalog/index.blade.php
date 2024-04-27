@extends('layouts.home')
@section('title', 'Alimentation')
@section('content')
    <!-- breadcrumbs  -->

    <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <ul class="flex items-center">
            <li class="cursor-pointer">
                <a href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                </a>
            </li>
            <li>
                <span class="mx-2 text-gray-500">&gt;</span>
            </li>

            <li class="text-gray-500">Catalog</li>
        </ul>
    </nav>
    <!-- /breadcrumbs  -->
    </div>

    <div class="relative py-4 ">
        <img class="w-full object-cover brightness-50 filter lg:h-[250px]" src="{{ asset('img/catalog_banner2.jpg') }}"
            alt="Living room image" />

        <div
            class="absolute top-1/2 left-1/2 mx-auto flex w-11/12 max-w-[1200px] -translate-x-1/2 -translate-y-1/2 flex-col text-center text-white lg:ml-5">
            <h1 class="text-xl sm:text-5xl lg:text-left">
                Best Collection of handmade products
            </h1>

        </div>
    </div>


    <div class="py-5  flex justify-end items-center gap-3 mx-auto flex-grow max-w-[1200px]">

        {{-- serach form --}}

        <form id="searchForm" class="w-full md:w-1/4 flex items-center border bg-neutral-100">
            <input class="ml-2 w-full md:w-auto px-2 outline-none bg-transparent" type="search" placeholder="Search" />
            <button class="h-full bg-rose-500 px-2 hover:bg-rose-300">
                Search
            </button>
        </form>


        {{-- /serach form --}}
        {{-- <div class="relative">
            <select id="sort_select_list"
                class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="price">Price: Low to High</option>
                <option value="price" class="desc">Price: High to low</option>
                <option value="name">Name: A to Z</option>
                <option value="name" class="desc">Name: Z to A</option>
                <option value="created_at">New arrivals</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M5 8l5 5 5-5"></path>
                </svg>

            </div>
        </div> --}}
    </div>



    <section class=" blueSection  container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10 ">

        <!-- sidebar  -->

        <section class="w-full lg:w-[300px] px-4 lg:px-0 lg:block">

            <form id="filter_form">


                <div class="flex border-b pb-5">
                    <div class="w-full">
                        <p class="mb-3 font-medium">CATEGORIES</p>
                        @foreach ($categories as $category)
                            <div class="flex w-full justify-between">
                                <div class="flex justify-center items-center">
                                    <input type="checkbox" class="categoryInput" value="{{ $category->id }}" />
                                    <p class="ml-4">{{ $category->name }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500">({{ $category->products->count() }})</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Price filter  --}}

                <div class=" w-full">
                    <div class="flex border-b py-5">
                        <div class="w-full">
                            <p class="mb-3 font-medium">PRICE</p>

                            <div x-data="range()" x-init="mintrigger();
                            maxtrigger()" class="relative max-w-xl w-full ">
                                <div>
                                    <input type="range" step="100" x-bind:min="min"
                                        x-bind:max="max" x-on:input="mintrigger" x-model="minprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                    <input type="range" step="100" x-bind:min="min"
                                        x-bind:max="max" x-on:input="maxtrigger" x-model="maxprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                    <div class="relative z-10 h-2">
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200">
                                        </div>
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-pink-400"
                                            x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>
                                        <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-pink-400 rounded-full -mt-2 -ml-1"
                                            x-bind:style="'left: ' + minthumb + '%'"></div>
                                        <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-pink-400 rounded-full -mt-2 -mr-3"
                                            x-bind:style="'right: ' + maxthumb + '%'"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center py-5">
                                    <div class="flex items-center">
                                        <div>
                                            <input id="min-input" type="text" maxlength="5" x-on:input="mintrigger"
                                                x-model="minprice"
                                                class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                                        </div>
                                        <div>
                                            <input id="max-input" type="text" maxlength="5" x-on:input="maxtrigger"
                                                x-model="maxprice"
                                                class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                                        </div>
                                        {{-- <div>
                                        <button type="submit"
                                            class="ml-2 px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Ok</button>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </form>


        </section>
        <!-- /sidebar  -->

        <section
            class="cards_container redSection flex-grow   mx-auto grid max-w-[1200px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-3 ">





        </section>


    </section>
    {{-- Pagination start --}}

    <div class="pagination_container flex justify-center m-10 space-x-2">

    </div>

    {{-- pagination end --}}




    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const filterForm = document.getElementById('filter_form');
            const searchForm = document.getElementById('searchForm');
            const searchInput = searchForm.querySelector('input[type="search"]');

            fetchAllProducts();


            filterForm.addEventListener('change', function() {
                filterProducts();
            });

            searchForm.addEventListener('submit', function(event) {


                event.preventDefault();
                const searchValue = searchInput.value.trim();

                filterProducts(searchValue);


            });

            function filterProducts(searchValue = "") {
                const categoyInputs = document.querySelectorAll('.categoryInput:checked');

                const selectedCategories = Array.from(document.querySelectorAll('.categoryInput:checked')).map(
                    input => input.value);

                const minPrice = document.getElementById('min-input').value;
                const maxPrice = document.getElementById('max-input').value;

                console.log('minPrice', minPrice);
                console.log('maxPrice', maxPrice);


                fetch("{{ route('catalog.filter') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            category_ids: selectedCategories,
                            min: minPrice,
                            max: maxPrice
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        let filteredProducts = data.products;
                        if (searchValue) {
                            console.log('data', data.products);

                            filteredProducts = filteredProducts.filter(product =>
                                product.name.toLowerCase().includes(searchValue.toLowerCase())
                            );
                        }
                        renderProducts(filteredProducts);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function fetchAllProducts() {
                fetch('/catalog/getProducts', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        renderProducts(data.products);

                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }








            function renderProducts(products) {
                const cardsContainer = document.querySelector('.cards_container');



                cardsContainer.innerHTML = '';

                if (products.length === 0) {
                    const noProductMessage = `
                <div class="text-center text-gray-600">No products found</div>
                `;
                    cardsContainer.innerHTML = noProductMessage;
                } else {

                    products.forEach(product => {
                        const card = `
                    <div class="flex flex-col">
                     <div class="relative flex">
                        <img class="w-full h-60 object-cover" src=" ${product.image}"
                            alt="sofa image" />
                            <div
                            class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100">
                            <a href="/details/${product.id}"
                                class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-rose-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </a>
                            <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-rose-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-4 w-4">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>
                            </span>
                        </div>

                        <div class="absolute right-1 mt-3 flex items-center justify-center bg-rose-400">

                        </div>
                    </div>

                    <div>
                        <p class="mt-2">${product.name}</p>
                        <p class="font-medium text-violet-900">
                            ${product.price}

                        </p>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4 text-rose-400">
                                <path fill-rule="evenodd"
                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                    clip-rule="evenodd" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4 text-rose-400">
                                <path fill-rule="evenodd"
                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                    clip-rule="evenodd" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4 text-rose-400">
                                <path fill-rule="evenodd"
                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                    clip-rule="evenodd" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4 text-rose-400">
                                <path fill-rule="evenodd"
                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                    clip-rule="evenodd" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4 text-gray-200">
                                <path fill-rule="evenodd"
                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm text-gray-400">(38)</p>
                        </div>

                        <div>
                            <form action="/cart/add/${product.id}" method="POST">
                                @csrf
                                <button class="my-5 h-10 w-full bg-violet-900 text-white">
                                    Add to cart
                                </button>
                            </form>
                        </div>
                    </div>
                    </div>
                    `;
                        cardsContainer.innerHTML += card;

                    });



                }

            }
        });

        // price range slider
        function range() {
            return {
                minprice: 0,
                maxprice: 1000,
                min: 0,
                max: 1300,
                minthumb: 0,
                maxthumb: 0,

                mintrigger() {
                    this.minprice = Math.min(this.minprice, this.maxprice - 50);
                    this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                },

                maxtrigger() {
                    this.maxprice = Math.max(this.maxprice, this.minprice + 50);
                    this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                },
            }
        }
    </script>



@endsection
