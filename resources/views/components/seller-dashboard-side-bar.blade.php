<!-- Desktop sidebar -->
<aside
class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-blue-500 dark:bg-gray-800 md:block"
>
<div class="py-4  text-gray-500 dark:text-gray-400">
  <div class="logo  pl-8">
  <a class=" " href="{{route('home')}}">
    <img
      class="cursor-pointer sm:h-auto sm:w-auto"
      src="{{asset('img/logo1.png')}}"
      alt="company logo"
    />
  </a>
</div>
  <ul class="mt-6">
    <li class="relative px-6 py-3">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="index.html"
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
    <li class="relative px-6 py-3">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="buttons.html"
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
            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
          ></path>
        </svg>
        <span class="ml-4">Buttons</span>
      </a>
    </li>
    <li class="relative px-6 py-3">
      <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="modals.html"
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
            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
          ></path>
        </svg>
        <span class="ml-4">Modals</span>
      </a>
    </li>
    <li class="relative px-6 py-3">
      <span
        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
        aria-hidden="true"
      ></span>
      <a
        class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
        href="tables.html"
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
          <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
        </svg>
        <span class="ml-4">Tables</span>
      </a>
    </li>
    <li class="relative px-6 py-3">
      <button
        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        @click="togglePagesMenu"
        aria-haspopup="true"
      >
        <span class="inline-flex items-center">
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
              d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
            ></path>
          </svg>
          <span class="ml-4">Pages</span>
        </span>
        <svg
          class="w-4 h-4"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <template x-if="isPagesMenuOpen">
        <ul
          x-transition:enter="transition-all ease-in-out duration-300"
          x-transition:enter-start="opacity-25 max-h-0"
          x-transition:enter-end="opacity-100 max-h-xl"
          x-transition:leave="transition-all ease-in-out duration-300"
          x-transition:leave-start="opacity-100 max-h-xl"
          x-transition:leave-end="opacity-0 max-h-0"
          class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
          aria-label="submenu"
        >
          <li
            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          >
            <a class="w-full" href="pages/login.html">Login</a>
          </li>
          <li
            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          >
            <a class="w-full" href="pages/create-account.html">
              Create account
            </a>
          </li>
          <li
            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          >
            <a class="w-full" href="pages/forgot-password.html">
              Forgot password
            </a>
          </li>
          <li
            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          >
            <a class="w-full" href="pages/404.html">404</a>
          </li>
          <li
            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          >
            <a class="w-full" href="pages/blank.html">Blank</a>
          </li>
        </ul>
      </template>
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
