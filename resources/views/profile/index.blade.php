@extends('layouts.home')
@section('title', 'Profile')
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

            <li class="text-gray-500">Account</li>
          </ul>
        </nav>
        <!-- /breadcrumbs  -->
      </div>

      <section
        class="container mx-auto w-full flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10"
      >
        <!-- sidebar  -->
        <x-profile-side-bar/>
        <!-- /sidebar  -->

        <!-- option cards  -->

        <div class="mb-5 flex items-center justify-between px-5 md:hidden">
          <div class="flex gap-3">
            <div class="py-5">
              <div class="flex items-center">
                <img
                  width="40px"
                  height="40px"
                  class="rounded-full object-cover"
                  src="./assets/images/avatar-photo.png"
                  alt="Red woman portrait"
                />
                <div class="ml-5">
                  <p class="font-medium text-gray-500">Hello,</p>
                  <p class="font-bold">Sarah Johnson</p>
                </div>
              </div>
            </div>
          </div>

          <div class="flex gap-3">
            <button class="border bg-amber-400 py-2 px-2">
              Profile settings
            </button>
          </div>
        </div>

        <section
          class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 lg:grid-cols-3"
        >
          <div class="">
            <div class="border py-5 shadow-md">
              <div class="flex justify-between px-4 pb-5">
                <p class="font-bold">Personal Profile</p>
                <a
                  class="text-sm text-violet-900"
                  href="profile-information.html"
                  >Edit</a
                >
              </div>

              <div class="px-4">
                <p>Sarah Johnson</p>
                <p>sarah@yandex.com</p>
                <p>20371</p>
                <p class="">1223 3432 3344 0082</p>
              </div>
            </div>
          </div>

          <div class="">
            <div class="border py-5 shadow-md">
              <div class="flex justify-between px-4 pb-5">
                <p class="font-bold">Shipping Address</p>
                <a class="text-sm text-violet-900" href="manage-address.html"
                  >Edit</a
                >
              </div>

              <div class="px-4">
                <p>Sarah Johnson</p>
                <p>Belgrade, Serbia</p>
                <p>20371</p>
                <p>1223 3432 3344 0082</p>
              </div>
            </div>
          </div>

          <div class="">
            <div class="border py-5 shadow-md">
              <div class="flex justify-between px-4 pb-5">
                <p class="font-bold">Billing Address</p>
                <a class="text-sm text-violet-900" href="#">Edit</a>
              </div>

              <div class="px-4">
                <p>Sarah Johnson</p>
                <p>Belgrade, Serbia</p>
                <p>20371</p>
                <p>1223 3432 3344 0082</p>
              </div>
            </div>
          </div>
        </section>
      </section>

      <!-- /Option cards -->

@endsection
```
