@extends('layouts.home')
@section('title', 'Alimentation')
@section('content')
    <!-- breadcrumbs  -->

    <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
        <ul class="flex items-center">
            <li class="cursor-pointer">
                <a href="index.html">
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
    <section
        class=" blueSection container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10 ">

        <!-- sidebar  -->
        <section class="hidden w-[300px] flex-shrink-0 px-4 lg:block">
            <div class="flex border-b pb-5">
                <div class="w-full">
                    <p class="mb-3 font-medium">CATEGORIES</p>

                    <div class="flex w-full justify-between">
                        <div class="flex justify-center items-center">
                            <input type="checkbox" />
                            <p class="ml-4">Bedroom</p>
                        </div>
                        <div>
                            <p class="text-gray-500">(12)</p>
                        </div>
                    </div>

                    <div class="flex w-full justify-between">
                        <div class="flex justify-center items-center">
                            <input type="checkbox" />
                            <p class="ml-4">Sofa</p>
                        </div>
                        <div>
                            <p class="text-gray-500">(15)</p>
                        </div>
                    </div>

                    <div class="flex w-full justify-between">
                        <div class="flex justify-center items-center">
                            <input type="checkbox" />
                            <p class="ml-4">Office</p>
                        </div>
                        <div>
                            <p class="text-gray-500">(14)</p>
                        </div>
                    </div>

                    <div class="flex w-full justify-between">
                        <div class="flex justify-center items-center">
                            <input type="checkbox" />
                            <p class="ml-4">Outdoor</p>
                        </div>
                        <div>
                            <p class="text-gray-500">(124)</p>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="flex border-b py-5">
                <div class="w-full">
                    <p class="mb-3 font-medium">PRICE</p>

                    <div class="flex w-full">
                        <div class="flex justify-between">
                            <input x-mask="99999" min="50" type="number" class="h-8 w-[90px] border pl-2"
                                placeholder="50" />
                            <span class="px-3">-</span>
                            <input x-mask="999999" type="number" max="999999" class="h-8 w-[90px] border pl-2"
                                placeholder="99999" />
                        </div>
                    </div>
                </div>
            </div>

            

            
        </section>
        <!-- /sidebar  -->

        <section
            class="redSection flex-grow  mx-auto grid max-w-[1200px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-3 ">
            <div class="flex flex-col">

                @foreach ($products as $product)
                <div class="relative flex">
                  <img
                    class="w-full h-60 object-cover"
                    src="{{ $product->getFirstMediaUrl('products') }}"
                    alt="sofa image"
                  />
                  <div
                    class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100"
                  >
                    <a
                      href="{{route('product.details', ['product' => $product->id])}}"
                      class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-4 w-4"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                      </svg>
                    </a>
                    <span
                      class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-4 w-4"
                      >
                        <path
                          d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"
                        />
                      </svg>
                    </span>
                  </div>
  
                  <div
                    class="absolute right-1 mt-3 flex items-center justify-center bg-amber-400"
                  >
                    
                  </div>
                </div>
              
                <div >
                  <p class="mt-2">{{$product->name}}</p>
                  <p class="font-medium text-violet-900">
                   ${{$product->price}}
                   
                  </p>
  
                  <div class="flex items-center">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      class="h-4 w-4 text-yellow-400"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd"
                      />
                    </svg>
  
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      class="h-4 w-4 text-yellow-400"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd"
                      />
                    </svg>
  
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      class="h-4 w-4 text-yellow-400"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd"
                      />
                    </svg>
  
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      class="h-4 w-4 text-yellow-400"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd"
                      />
                    </svg>
  
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      class="h-4 w-4 text-gray-200"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <p class="text-sm text-gray-400">(38)</p>
                  </div>
  
                  <div>
                    <form action="{{route('cart.store',['product'=>$product->id]) }}" method="POST">
                      @csrf
                  <button class="my-5 h-10 w-full bg-violet-900 text-white">
                    Add to cart
                  </button>
                  </form>
                  </div>
                </div>
                

              </div>
              @endforeach
  
              
  
              
        
            </section>


    </section>
    


@endsection
