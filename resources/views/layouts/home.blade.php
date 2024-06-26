<!doctype html>
<html lang="en">
  <head>
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/tailwind-ecommerce.css')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="32x32" href="/img/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logo.png" />

    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#207891" />
    <meta name="msapplication-TileColor" content="#ffc40d" />
    <meta name="theme-color" content="#ffffff" />
    {{-- Alpine js CDN --}}
    <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
    ></script>
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Splide js CDN --}}
    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet">
    


    <style>
      input[type=range]::-webkit-slider-thumb {
        pointer-events: all;
        width: 24px;
        height: 24px;
        -webkit-appearance: none;
      /* @apply w-6 h-6 appearance-none pointer-events-auto; */
      }
    </style> 
    
    {{-- title --}}
    <title>@yield('title','Dari shop')</title>
  </head>

  <body class="bg-neutral-100" x-data="{ desktopMenuOpen: false, mobileMenuOpen: false}">
    <!-- Header -->
    <header
      class="mx-auto flex h-16 max-w-[1200px] items-center justify-between px-5"
    >
    
    {{-- logo --}}
      <a href="{{route('home')}}">
        <img
          class="cursor-pointer sm:h-auto sm:w-auto"
          src="{{asset('img/logo3.png')}}"
          alt="company logo"
        />
      </a>

      <div class="md:hidden">
        <button @click="mobileMenuOpen = ! mobileMenuOpen">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-8 w-8"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </button>
      </div>

     

   
      {{-- wishlist Cart Account --}}
      @auth
      <div class="hidden gap-3 md:!flex">
      
        @if(Auth::user()->roles->first()->title =='Customer')
        <a
          href="{{route('cart.index')}}"
          class="flex cursor-pointer flex-col items-center justify-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-6 w-6"
          >
            <path
              fill-rule="evenodd"
              d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
              clip-rule="evenodd"
            />
          </svg>

          <p class="text-xs">Cart</p>
        </a>
        @endif

        @if(Auth::user()->roles->first()->title =='Seller')
        
        <a
          href="{{route('products.index')}}"
          class="flex cursor-pointer flex-col items-center justify-center"
        >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V5zm2 1v10h14V6H5zM8 8h8v2H8V8zm0 4h8v2H8v-2zm-3.5 2.5a.5.5 0 11-1 0 .5.5 0 011 0zm0-3a.5.5 0 11-1 0 .5.5 0 011 0zm7 3a.5.5 0 11-1 0 .5.5 0 011 0zm0-3a.5.5 0 11-1 0 .5.5 0 011 0zM6 19a1 1 0 011-1h10a1 1 0 011 1v1H6v-1zm14-2H4V6h16v11z" clip-rule="evenodd"/>
        </svg>
          <p class="text-xs">Dashboard</p>
        </a>
        @endif


        @if(Auth::user()->roles->first()->title =='Admin')
        
        <a
          href="{{route('users.index')}}"
          class="flex cursor-pointer flex-col items-center justify-center"
        >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V5zm2 1v10h14V6H5zM8 8h8v2H8V8zm0 4h8v2H8v-2zm-3.5 2.5a.5.5 0 11-1 0 .5.5 0 011 0zm0-3a.5.5 0 11-1 0 .5.5 0 011 0zm7 3a.5.5 0 11-1 0 .5.5 0 011 0zm0-3a.5.5 0 11-1 0 .5.5 0 011 0zM6 19a1 1 0 011-1h10a1 1 0 011 1v1H6v-1zm14-2H4V6h16v11z" clip-rule="evenodd"/>
        </svg>
          <p class="text-xs">Dashboard</p>
        </a>
        @endif



        @if(Auth::user()->roles->first()->title =='Customer')
        <a
          href="{{route('profile.edit')}}"
          class="relative flex cursor-pointer flex-col items-center justify-center"
        >
          <span class="absolute bottom-[33px] right-1 flex h-2 w-2">
            <span
              class="absolute inline-flex h-full w-full animate-ping rounded-full bg-rose-500 opacity-75"
            ></span>
            <span
              class="relative inline-flex h-2 w-2 rounded-full bg-rose-500"
            ></span>
          </span>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
            />
          </svg>

          <p class="text-xs">Account</p>
        </a>
        @endif
      </div>
      @endauth
      {{-- /wishlist Cart Account --}}

    </header>
    <!-- /Header -->

    <!-- Burger menu  -->
    <section
      x-show="mobileMenuOpen"
      @click.outside="mobileMenuOpen = false"
      class="absolute left-0 right-0 z-50 h-screen w-full bg-neutral-100"
      style="display: none"
    >
      <div class="mx-auto">
        <div class="mx-auto flex w-full justify-center gap-3 py-4">
          

          <a
            href="{{route('cart.index')}}"
            class="flex cursor-pointer flex-col items-center justify-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="h-6 w-6"
            >
              <path
                fill-rule="evenodd"
                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                clip-rule="evenodd"
              />
            </svg>

            <p class="text-xs">Cart</p>
          </a>

          <a
            href="{{route('profile.edit')}}"
            class="relative flex cursor-pointer flex-col items-center justify-center"
          >
            <span class="absolute bottom-[33px] right-1 flex h-2 w-2">
              <span
                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"
              ></span>
              <span
                class="relative inline-flex h-2 w-2 rounded-full bg-red-500"
              ></span>
            </span>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
              />
            </svg>

            <p class="text-xs">Account</p>
          </a>
        </div>

        <form class="my-4 mx-5 flex h-9 items-center border">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="mx-3 h-4 w-4"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
            />
          </svg>

          <input
            class="hidden w-11/12 outline-none md:block"
            type="search"
            placeholder="Search"
          />

          <button
            type="submit"
            class="ml-auto h-full bg-rose-500 px-4 hover:bg-rose-300"
          >
            Search
          </button>
        </form>
        <ul class="text-center font-medium">
          <li class="py-2"><a href="{{route('home')}}">Home</a></li>
          <li class="py-2"><a href="{{route('catalog.index')}}">Catalog</a></li>
          <li class="py-2"><a href="{{route('about')}}">About Us</a></li>
          <li class="py-2"><a href="{{route('contact')}}">Contact Us</a></li>
        </ul>
      </div>
    </section>
    <!-- /Burger menu  -->

    <!-- Nav bar -->
    <!-- hidden on small devices -->

    <nav class="relative bg-blue-900">
      <div
        class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex"
      >
        <button
          @click="desktopMenuOpen = ! desktopMenuOpen"
          class="ml-4 flex h-full w-40 cursor-pointer items-center justify-center bg-rose-500"
        >
          <div class="flex justify-around" href="#">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="mx-1 h-6 w-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
              />
            </svg>

            All categories
          </div>
        </button>

        <div class="mx-7 flex gap-8">
          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('home')}}"
            >Home</a
          >
          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('catalog.index')}}"
            >Catalog</a
          >
          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('about')}}"
            >About Us</a
          >
          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('contact')}}"
            >Contact Us</a
          >
        </div>

        <div class="ml-auto flex gap-4 px-5">
          @guest
          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('login_page')}}"
            >Login</a
          >

          <span class="text-white">&#124;</span>

          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('registration')}}"
            >Sign Up</a
          >
          @endguest

          @auth
          <a
            class="font-light text-white duration-100 hover:text-rose-400 hover:underline"
            href="{{route('logout')}}"
            >Logout</a>
          @endauth
        </div>
      </div>
    </nav>
    <!-- /Nav bar -->

    <!-- Categories Menu  -->
    <section
      x-show="desktopMenuOpen"
      @click.outside="desktopMenuOpen = false"
      class=" fixed  left-0 right-0 z-10 w-full "
      style="display: none"
    >
      <div class="  hidden md:flex absolute left-44 mx-auto flex max-w-[300px] py-5 bg-rose-500 ">
        <div class="w-[300px] ">
          <ul class="px-5">

            @foreach($categories as $category)
            <li
              class=" flex items-center gap-2 bg-rose-500 py-2 px-3 active:bg-rose-500 cursor-pointer hover:bg-neutral-100"
    
            >
            <a href="{{route('catalog.category',$category->id)}}" class="flex items-center gap-2">
  
              {{$category->name}}
             
            </a>
            </li>
            @endforeach

            
            

           
          </ul>
        </div>

      
      </div>
    </section>

    <!-- /Menu  -->

    @yield('content')

  
  <!-- Desktop Footer  -->

  <footer
  class="mx-auto w-full max-w-[1200px] justify-between pb-10 flex flex-col lg:flex-row"
>
  <div class="ml-5">
    <img
      class="mt-10 mb-5"
      src="{{asset('img/logo.png')}}"
      alt="company logo"
    />
    <p class="pl-0">
      Produits Fait maison<br />
      partout au Maroc
    </p>
    <div class="mt-10 flex gap-3">
      <a href="https://github.com/bbulakh">
        <img
          class="h-5 w-5 cursor-pointer"
          src="{{asset('img/github.svg')}}"
        />
      </a>
      <a href="https://t.me/b_bulakh">
        <img
          class="h-5 w-5 cursor-pointer"
          src="{{asset('img/telegram.svg')}}"
          alt="telegram icon"
        />
      </a>
      <a href="https://www.linkedin.com/in/bogdan-bulakh-393284190/">
        <img
          class="h-5 w-5 cursor-pointer"
          src="{{asset('img/linkedin.svg')}}"
          alt="twitter icon"
        />
      </a>
    </div>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <div class="mx-5 mt-10">
      <p class="font-medium text-gray-500">FEATURES</p>
      <ul class="text-sm leading-8">
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Commerce</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Merchendise</a></li>
      </ul>
    </div>

    <div class="mx-5 mt-10">
      <p class="font-medium text-gray-500">SUPPORT</p>
      <ul class="text-sm leading-8">
        <li><a href="#">Pricing</a></li>
        <li><a href="#">Docs</a></li>
        <li><a href="#">Audition</a></li>
        <li><a href="#">Art Status</a></li>
      </ul>
    </div>

    <div class="mx-5 mt-10">
      <p class="font-medium text-gray-500">DOCUMENTS</p>
      <ul class="text-sm leading-8">
        <li><a href="#">Terms</a></li>
        <li><a href="#">Conditions</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">License</a></li>
      </ul>
    </div>

    <div class="mx-5 mt-10">
      <p class="font-medium text-gray-500">DELIVERY</p>
      <ul class="text-sm leading-8">
        <li><a href="#">List of countries</a></li>
        <li><a href="#">Special information</a></li>
        <li><a href="#">Restrictions</a></li>
        <li><a href="#">Payment</a></li>
      </ul>
    </div>
  </div>
</footer>
<!-- /Desktop Footer  -->

<!-- Payment and copyright  -->

<section class="h-11 bg-rose-500">
  <div
    class="mx-auto flex max-w-[1200px] items-center justify-between px-4 pt-2"
  >
    <p>&copy; Dari Shop, 2024</p>
    <div class="flex items-center space-x-3">
      <img
        class="h-8"
        src="https://cdn-icons-png.flaticon.com/512/5968/5968299.png"
        alt="Visa icon"
      />
      <img
        class="h-8"
        src="https://cdn-icons-png.flaticon.com/512/349/349228.png"
        alt="AE icon"
      />
      <img
        class="h-8"
        src="https://cdn-icons-png.flaticon.com/512/5968/5968144.png"
        alt="Apple pay icon"
      />
    </div>
  </div>
</section>
<!-- /Payment and copyright  -->
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
<script type="module" src="{{asset('js/script.js')}}"></script>

</body>
</html>
