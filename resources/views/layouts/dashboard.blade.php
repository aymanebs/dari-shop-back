<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title','Dashboard')</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/tailwind.output.css')}}"> 
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('js/init-alpine.js')}}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{asset('js/charts-lines.js')}}"></script>
    <script src="{{asset('js/charts-pie.js')}}"></script>
    {{-- flowbite CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
         <!-- sidebar -->
         <x-dashboard-side-bar/>
         <!-- Mobile sidebar -->
         <x-mobile-dashboard-side-bar/>
         <!-- Search input -->
         <x-dashboard-search-bar/>
         <!-- Theme toggler -->
         <x-dashboard-theme-toggler/>
         <!-- Notification menu --> 
         <x-dashboard-notification-menu/>
         <!-- Profile menu -->
         <x-dashboard-profile-menu/>
       </div>

    @yield('content')
    
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>