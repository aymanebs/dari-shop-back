@extends('layouts.home')
@section('title', 'Product Details')
@section('content')
        <!-- breadcrumbs  -->

        <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">

         


            <ul class="flex items-center">
              <li class="cursor-pointer">
                <a href="{{route('home')}}">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-5 w-5"
                  >
                    <path
                      d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"
                    />
                    <path
                      d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"
                    />
                  </svg>
                </a>
              </li>
              <li>
                <span class="mx-2 text-gray-500">&gt;</span>
              </li>
  
              <li class="text-gray-500">{{$product->name}}</li>
            </ul>
          </nav>
          <!-- /breadcrumbs  -->
        </div>


        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">{{ session('error') }}</span>
        
        </div>
        @endif
  
        <section
          class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:grid lg:grid-cols-2 lg:py-10"
        >
      


          <!-- image gallery -->
  
          <div class="container mx-auto px-4">
            <img
              class="w-full"
              src="{{$product->getFirstMediaUrl('products')}}"
              alt="image"
            />
  
            <div class="mt-3 grid grid-cols-4 gap-4">
              @foreach($product->getMedia('products') as $image)
              <div>
                <img
                  class="cursor-pointer"
                  src="{{$image->getUrl()}}"
                  alt="kitchen image"
                />
              </div>
              @endforeach
   
            </div>
            
            <!-- /image gallery  -->
          </div>
  
          <!-- description  -->
  
          <div class="mx-auto px-5 lg:px-5">
            <h2 class="pt-3 text-2xl font-bold lg:pt-0">{{$product->name}}</h2>
            <div class="mt-1">
              <div class="flex items-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="h-4 w-4 text-rose-400"
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
                  class="h-4 w-4 text-rose-400"
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
                  class="h-4 w-4 text-rose-400"
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
                  class="h-4 w-4 text-rose-400"
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
  
                <p class="ml-3 text-sm text-gray-400">(150 reviews)</p>
              </div>
            </div>
  
            <p class="mt-5 font-bold">
              @if($product->isInStock())
              Availability: <span class="text-green-600">In Stock</span>
              
              @else
              Availability: <span class="text-red-600">Out of Stock</span>
              @endif
            </p>
            {{-- <p class="font-bold">Brand: <span class="font-normal">Apex</span></p> --}}
            <p class="font-bold">
              Category: <span class="font-normal">{{$product->category->name}}</span>
            </p>  
            <p class="font-bold">
              Seller: <span class="font-normal">{{$product->seller->name}}</span>
            </p>  
          
            <p class="mt-4 text-4xl font-bold text-violet-900">
              {{$product->price}} $ 
            </p>
  
            <p class="pt-5 text-sm leading-5 text-gray-500">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem
              exercitationem voluptate sint eius ea assumenda provident eos
              repellendus qui neque! Velit ratione illo maiores voluptates commodi
              eaque illum, laudantium non!
            </p>
  
           
  
           
            @if($product->isInStock())
            <div class="mt-7 flex flex-row items-center gap-6">
              <form action="{{route('cart.store',['product'=>$product->id])}}" method="POST">
                @csrf
              <button
                class="flex h-12 px-3 items-center justify-center bg-violet-900 text-white duration-100 hover:bg-blue-800"
                type="submit"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="mr-3 h-4 w-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                  />
                </svg>
  
                Add to cart
              </button>
              </form>

             
            </div>
            @endif
          </div>
        </section>
  
        
  
        <!-- /description  -->
  
        
  
     
@endsection
  