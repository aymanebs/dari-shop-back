<section class="hidden flex-shrink-0 px-4 lg:block">
    <div class="border-b py-5">
      <div class="flex items-center">
        <img
          width="40px"
          height="40px"
          class="rounded-full object-cover"
          src="{{auth()->user()->customer->getFirstMediaUrl('avatars')}}"
          alt="portrait"
        />
        <div class="ml-5">
          <p class="font-medium text-gray-500">Hello,</p>
          <p class="font-bold">{{auth()->user()->customer->name}}</p>
        </div>
      </div>
    </div>

    <div class="flex border-b py-5">
      <div class="w-full">
        <div class="flex w-full">
          <div class="flex flex-col gap-2">
            <a
              href="{{route('profile')}}"
              class="flex items-center gap-2 font-medium active:text-violet-900"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-5 w-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                />
              </svg>
              Manage account</a
            >
            <a
              href="{{route('profile.edit')}}"
              class="text-gray-500 duration-100 hover:text-rose-400"
              >Profile information</a
            >
            <a
              href="{{route('profile.edit-adress')}}"
              class="text-gray-500 duration-100 hover:text-rose-400"
              >Manage Addresses</a
            >
            <a
              href="{{route('profile.edit-password')}}"
              class="text-gray-500 duration-100 hover:text-rose-400"
              >Change password</a
            >
          </div>
        </div>
      </div>
    </div>

    <div class="flex border-b py-5">
      <div class="flex w-full">
        <div class="flex flex-col gap-2">
          <a
            href="{{route('profile.orders')}}"
            class="flex items-center gap-2 font-medium active:text-violet-900"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="h-5 w-5"
            >
              <path
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z"
              />
              <path
                fill-rule="evenodd"
                d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z"
                clip-rule="evenodd"
              />
            </svg>

            My Order History</a
          >
        </div>
      </div>
    </div>

    {{-- <div class="flex border-b py-5">
      <div class="flex w-full">
        <div class="flex flex-col gap-2">
          <a
            href="payment-methods.html"
            class="flex items-center gap-2 font-medium active:text-violet-900"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-5 w-5"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"
              />
            </svg>

            Payment Methods</a
          >
        </div>
      </div>
    </div> --}}

    <div class="flex border-b py-5">
      <div class="flex w-full">
        <div class="flex flex-col gap-2">
          <a
            href="{{route('profile.wishlist')}}"
            class="flex items-center gap-2 font-medium text-violet-900"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-5 w-5"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
              />
            </svg>

            My Wishlist</a
          >
        </div>
      </div>
    </div>

    <div class="flex py-5">
      <div class="flex w-full">
        <div class="flex flex-col gap-2">
          <a
            href="{{route('logout')}}"
            class="flex items-center gap-2 font-medium active:text-violet-900"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-5 w-5"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"
              />
            </svg>

            Log Out</a
          >
        </div>
      </div>
    </div>
  </section>