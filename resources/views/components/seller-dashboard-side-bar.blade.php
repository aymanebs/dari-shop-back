<!-- Desktop sidebar -->
<aside
class=" z-20 flex-shrink-0 hidden w-64 overflow-y-auto  dark:bg-gray-800 md:block"
>
<div class="py-4  text-gray-500 dark:text-gray-400">
  <div class="logo  pl-20">
  <a class=" " href="{{route('home')}}">
    <img
      class="cursor-pointer sm:h-auto sm:w-auto h-10 w-10"
      src="{{asset('img/logo4.png')}}"
      alt="company logo"
    />
  </a>
</div>
  <ul class="mt-6">
    <li class="relative px-6 py-3 pt-10">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="{{route('seller.dashboard')}}"
      >
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
          ></path>
        </svg>
        <span class="ml-4">Dashboard</span>
      </a>
    </li>
  </ul>
  <ul>
    <li class="relative px-6 py-3">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="{{route('products.index')}}"
      >
      <svg
      class="w-6 h-6"
      aria-hidden="true"
      fill="none"
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
    <path d="M12 12l8 -4.5" />
    <path d="M12 12l0 9" />
    <path d="M12 12l-8 -4.5" />
    <path d="M16 5.25l-8 4.5" />
    </svg>
        <span class="ml-4">Products</span>
      </a>
    </li>
    <li class="relative px-6 py-3">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="cards.html"
      >
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
          ></path>
        </svg>
        <span class="ml-4">Cards</span>
      </a>
    </li>
    <li class="relative px-6 py-3">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="charts.html"
      >
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
          ></path>
          <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
        </svg>
        <span class="ml-4">Charts</span>
      </a>
    </li>
  
  </ul>
  <div class="px-6 my-6">
    <button
      class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
    >
      Create account
      <span class="ml-2" aria-hidden="true">+</span>
    </button>
  </div>
</div>

</aside>
