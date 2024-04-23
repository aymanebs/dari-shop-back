@extends('layouts.profile')
@section('title', 'Edit Profile')
@section('profile-content')


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
                  src="{{auth()->user()->getFirstMediaUrl('avatars')}}"
                  alt="Sarah Johnson image"
                />

                <form>
                  <div>
                    <label class="block">
                      <span class="sr-only">Choose profile photo </span>
                      <input
                        type="file"
                        class="mx-auto ml-5 flex w-full justify-center border-yellow-400 text-sm outline-none file:mr-4 file:bg-rose-400 file:py-2 file:px-4 file:text-sm file:font-semibold"
                      />
                    </label>
                  </div>
                </form>
              </div>
            </div>

            

            {{-- <form class="flex w-full flex-col gap-3" action="{{route('profile.update',['customer'=>$customer->id])}}"> --}}
              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >First Name<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="text"
                  placeholder=""
                  value="{{auth()->user()->customer->name}}"
                  name="name"
                />
              </div>

              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >Email<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="email"
                  placeholder="Johnson"
                  value="{{auth()->user()->email}}"
                  name="email"
                />
              </div>

              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >Phone number<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="text"
                  placeholder=""
                  value="{{auth()->user()->customer->phone}}"
                  name="phone"
                />
              </div>

                <button class="mt-4 w-40 bg-violet-900 px-4 py-2 text-white" type="submit">
                  Save changes
                </button>
              </div>
            </form>
          </div>
        </section>
        <!-- /form  -->
      </section>

@endsection
