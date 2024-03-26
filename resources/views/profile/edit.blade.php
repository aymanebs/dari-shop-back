@extends('layouts.home')
@section('title', 'Edit Profile')
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
        class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10"
      >
        <!-- sidebar  -->
        <x-profile-side-bar/>
        <!-- /sidebar  -->

        <!-- form  -->
        <section
          class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10"
        >
          <div class="py-5">
            <div class="w-full">
              <h2>Avatar image</h2>
              <div
                class="mx-auto mb-5 flex flex-row items-center bg-neutral-100 py-5 lg:mx-0 lg:w-1/2"
              >
                <img
                  class="ml-5 h-20 w-20 rounded-full"
                  src="./assets/images/avatar-photo.png"
                  alt="Sarah Johnson image"
                />

                <form>
                  <div>
                    <label class="block">
                      <span class="sr-only">Choose profile photo</span>
                      <input
                        type="file"
                        class="mx-auto ml-5 flex w-full justify-center border-yellow-400 text-sm outline-none file:mr-4 file:bg-rose-400 file:py-2 file:px-4 file:text-sm file:font-semibold"
                      />
                    </label>
                  </div>
                </form>
              </div>
            </div>

            <form class="flex w-full flex-col gap-3" action="">
              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >First Name<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="text"
                  placeholder="Sarah"
                />
              </div>

              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >Last Name<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="text"
                  placeholder="Johnson"
                />
              </div>

              <div class="flex flex-col">
                <label for="">Bio</label>
                <textarea
                  class="w-full border px-4 py-2 text-gray-500 outline-none lg:w-1/2"
                  name=""
                  id=""
                  cols="30"
                  rows="10"
                >
  CEO, MayBell Inc.</textarea
                >

                <button class="mt-4 w-40 bg-violet-900 px-4 py-2 text-white">
                  Save changes
                </button>
              </div>
            </form>
          </div>
        </section>
        <!-- /form  -->
      </section>

@endsection
