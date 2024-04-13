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

      <!-- Mobile order table  -->
      <section
        class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden"
      >
        <!-- 1 -->

        <div class="flex w-full border px-4 py-4">
          <div class="ml-3 flex w-full flex-col justify-center">
            <div class="flex items-center justify-between">
              <p class="text-xl font-bold">Order &numero; 1245</p>
              <div class="border border-green-500 px-2 py-1 text-green-500">
                Delivered
              </div>
            </div>
            <p class="text-sm text-gray-400">22/06/2023</p>
            <p class="py-3 text-xl font-bold text-violet-900">$620</p>
            <div class="mt-2 flex w-full items-center justify-between">
              <div class="flex items-center justify-center">
                <a
                  href="order-overview.html"
                  class="flex cursor-text items-center justify-center bg-rose-500 px-2 py-2 active:ring-gray-500"
                >
                  View order
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- 2 -->

        <div class="flex w-full border px-4 py-4">
          <div class="ml-3 flex w-full flex-col justify-center">
            <div class="flex items-center justify-between">
              <p class="text-xl font-bold">Order &numero; 1232</p>
              <div class="border border-orange-500 px-2 py-1 text-orange-500">
                Progress
              </div>
            </div>
            <p class="text-sm text-gray-400">20/05/2023</p>
            <p class="py-3 text-xl font-bold text-violet-900">$320</p>
            <div class="mt-2 flex w-full items-center justify-between">
              <div class="flex items-center justify-center">
                <a
                  href="order-overview.html"
                  class="flex cursor-text items-center justify-center bg-rose-500 px-2 py-2 active:ring-gray-500"
                >
                  View order
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- 3 -->

        <div class="flex w-full border px-4 py-4">
          <div class="ml-3 flex w-full flex-col justify-center">
            <div class="flex items-center justify-between">
              <p class="text-xl font-bold">Order &numero; 3246</p>
              <div class="border border-red-500 px-2 py-1 text-red-500">
                Declined
              </div>
            </div>
            <p class="text-sm text-gray-400">03/03/2022</p>
            <p class="py-3 text-xl font-bold text-violet-900">$2500</p>
            <div class="mt-2 flex w-full items-center justify-between">
              <div class="flex items-center justify-center">
                <a
                  href="order-overview.html"
                  class="flex cursor-text items-center justify-center bg-rose-500 px-2 py-2 active:ring-gray-500"
                >
                  View order
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- 4 -->

        <div class="flex w-full border px-4 py-4">
          <div class="ml-3 flex w-full flex-col justify-center">
            <div class="flex items-center justify-between">
              <p class="text-xl font-bold">Order &numero; 9827</p>
              <div class="border border-blue-500 px-2 py-1 text-blue-500">
                Need Payment
              </div>
            </div>
            <p class="text-sm text-gray-400">31/01/20</p>
            <p class="py-3 text-xl font-bold text-violet-900">$1700</p>
            <div class="mt-2 flex w-full items-center justify-between">
              <div class="flex items-center justify-center">
                <a
                  href="order-overview.html"
                  class="flex cursor-text items-center justify-center bg-rose-500 px-2 py-2 active:ring-gray-500"
                >
                  View order
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Mobile order table  -->

      <!-- Order table  -->
      <section
        class="hidden h-[600px] w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 lg:grid"
      >
        <table class="table-fixed">
          <thead class="h-16 bg-neutral-100">
            <tr>
              <th>ORDER</th>
              <th>DATE</th>
              <th>TOTAL</th>
              <th>STATUS</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <!-- 1 -->
            @foreach($orders as $order)
            <tr class="h-[100px] border-b">
              <td class="text-center align-middle">&#8470; {{$order->id}}</td>
              <td class="mx-auto text-center">{{$order->updated_at->format('d/m/Y')}}</td>
              <td class="text-center align-middle">&#36;620</td>

              <td class="mx-auto text-center">

                @switch($order->status)
                @case(1)
                <span
                  class="border-2 border-orange-500 py-1 px-3 text-orange-500"
                  >{{$order->getStatus()}}</span
                >
                @break
                @case(2)

                <span
                  class="border-2 border-green-500 py-1 px-3 text-green-500"
                  >{{$order->getStatus()}}</span
                >
                @break
                @endswitch
              </td>
              <td class="text-center align-middle">
                <a href="order-overview.html" class="bg-rose-400 px-4 py-2"
                  ><button class="text-center">View</button></a
                >
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </section>
      <!-- /Order table  -->
    </section>
@endsection