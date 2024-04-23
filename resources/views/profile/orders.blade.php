@extends('layouts.home')
@section('title', 'My Orders')
@section('content')
       <!-- breadcrumbs  -->

       <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
        <ul class="flex items-center">
          <li class="cursor-pointer">
            <a href="index.html">
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

          <li class="text-gray-500">My Order History</li>
        </ul>
      </nav>
      <!-- /breadcrumbs  -->
    </div>

    <section
      class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10"
    >
      <!-- sidebar  -->
      <x-profile-side-bar/>
      <!-- /sidebar  -->

   

 <!-- Order table  -->
<section class=" sm:block w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 md:grid">
  <div class="overflow-x-auto">
      <table class="w-full lg:table">
          <thead class="h-16 bg-neutral-100">
              <tr>
                  <th class="px-4">ORDER</th>
                  <th class="px-4">DATE</th>
                  <th class="px-4">TOTAL</th>
                  <th class="px-4">STATUS</th>
                  <th class="px-4">ACTION</th>
              </tr>
          </thead>
          <tbody>
              <!-- 1 -->
              @foreach ($orders as $order)
              <tr class="h-[100px] border-b">
                  <td class="text-center align-middle px-4">&#8470; {{ $order->id }}</td>
                  <td class="mx-auto text-center px-4">{{ $order->updated_at->format('d/m/Y') }}</td>
                  <td class="text-center align-middle px-4">&#36; 
                    {{ $order->total}}
                  </td>
                  <td class="mx-auto text-center px-4">
                      @switch($order->status)
                          @case(1)
                              <span class="border-2 border-orange-500 py-1 px-3 text-orange-500">{{ $order->getStatus() }}</span>
                              @break
                          @case(2)
                              <span class="border-2 border-green-500 py-1 px-3 text-green-500">{{ $order->getStatus() }}</span>
                              @break
                      @endswitch
                  </td>
                  <td class="text-center align-middle px-4">
                      <a href="order-overview.html" class="bg-rose-400 px-4 py-2">
                          <button class="text-center">View</button>
                      </a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</section>
<!-- /Order table  -->
    </section>

@endsection