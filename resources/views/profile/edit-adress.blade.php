@extends('layouts.profile')
@section('title', 'Edit Address')
@section('profile-content')

   <!-- form  -->
        <section
          class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10"
        >
          <div class="py-5">
            <div class="w-full"></div>
            <form class="flex w-full flex-col gap-3" action="">
              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >Adresse<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="text"
                  placeholder="Adresse"
                  value="{{auth()->user()->customer->adress}}"
                />
              </div>

              <div class="flex w-full flex-col">
                <label class="flex" for="name"
                  >Region<span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span
                ></label>
                <input
                  class="w-full border px-4 py-2 lg:w-1/2"
                  type="text"
                  placeholder="Region"
                  value=""
                />
              </div>

              <div class="flex flex-col">
                <label class="flex" for="">Ville
                  <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"
                  ></span>
                </label>
                <input
                class="w-full border px-4 py-2 lg:w-1/2"
                type="text"
                placeholder="Ville"
                value=""
              />
              </div>

              <button class="mt-4 w-40 bg-violet-900 px-4 py-2 text-white">
                Save changes
              </button>
            </form>
          </div>
        </section>
        <!-- /form  -->
      </section>

@endsection        