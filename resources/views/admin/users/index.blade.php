@extends('layouts.dashboard')
@section('title','Users')
@section('content')

    </header>
    <main class="h-full pb-16 overflow-y-auto">
      <div class="container grid px-6 mx-auto">
        <h2
          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Tables
        </h2>
        <!-- CTA -->
        <a
          class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
          href="https://github.com/estevanmaito/windmill-dashboard"
        >
          <div class="flex items-center">
            <svg
              class="w-5 h-5 mr-2"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              ></path>
            </svg>
            <span>Star this project on GitHub</span>
          </div>
          <span>View more &RightArrow;</span>
        </a>

        <!-- Table -->
        <h4
          class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
        >
          Users
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                  <th class="px-4 py-3">User</th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Role</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3">Date</th>
                  <th class="px-4 py-3">Actions</th>
                </tr>
              </thead>
              <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
              >
              @foreach ($users as $user)
                  
            
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">{{$user->name}}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                          10x Developer
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{$user->email}}
                  </td>
                  <td class="px-4 py-3 text-xs">
                    @switch($user->roles->first()->id)
                       @case(1)
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                      >
                        @break

                        @case(2)
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-full dark:bg-indigo-700 dark:text-indigo-100"
                      >
                      @break

                      @case(3)
                      <span
                      class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100"
                    >
                      @break
                        
                            
                    @endswitch
                    
                  
                      {{$user->roles->first()->title}}
                    </span>
                  </td>
                  <td class="px-4 py-3 text-xs">
                    @switch($user->status)
                    @case(1)
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                    >
                    @break
                    @case(2)
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
                    >
                    @break
                    @endswitch
                      {{$user->getstatus()}}
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{$user->created_at->format('d/m/Y')}}
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <form action="{{route('users.ban',['user'=>$user->id])}}" method="POST">
                        @csrf
                      <button type="submit"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Ban"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-ban">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M5.7 5.7l12.6 12.6" />
                      </svg>
                    </button>
                    </form>


                    <form action="{{route('users.unban',['user'=>$user->id])}}" method="POST">
                      @csrf
                    <button type="submit"
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="UnBan"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                      <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                    </svg>
                  </button>
                  </form>

                    </div>
                  </td>
                </tr>   
                @endforeach
              </tbody>
            </table>
          </div>
          <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
          >
            <span class="flex items-center col-span-3">
              {{-- Showing 21-30 of 100 --}}
              {{-- showing {{$users->firstItem()}}-{{$user->lastItem()}} of {{$users->total()}} --}}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                 
                  <li>
                    <button
                      class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                      aria-label="Previous"
                    >
                      <svg
                        class="w-4 h-4 fill-current"
                        aria-hidden="true"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"
                          fill-rule="evenodd"
                        ></path>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      1
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      2
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      3
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      4
                    </button>
                  </li>
                  <li>
                    <span class="px-3 py-1">...</span>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      8
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      9
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                      aria-label="Next"
                    >
                      <svg
                        class="w-4 h-4 fill-current"
                        aria-hidden="true"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"
                          fill-rule="evenodd"
                        ></path>
                      </svg>
                    </button>
                  </li>
                </ul>
              </nav>
            </span>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

@endsection
