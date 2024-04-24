@extends('layouts.profile')
@section('title', 'Edit Address')
@section('profile-content')

    <!-- form  -->
    <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
    @if (session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif
    @if (session('error'))
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p>{{ session('error') }}</p>
      </div>
    @endif
        <div class="py-5">
            <div class="w-full"></div>
            <form class="flex w-full flex-col gap-3" action="{{route('profile.update-adress')}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="flex w-full flex-col">
                    <label class="flex" for="name">Adresse<span
                            class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                    <input name="adress" class="w-full border px-4 py-2 lg:w-1/2" type="text" placeholder="Adresse"
                        value="{{ auth()->user()->customer->adress }}" />
                        @error('adress')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex w-full flex-col">
                    <label class="flex" for="name">Region<span
                            class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                    <input name="region" class="w-full border px-4 py-2 lg:w-1/2" type="text" placeholder="Region" value="{{auth()->user()->customer->region}}" />
                    @error('region')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="flex" for="">Ville
                        <span
                            class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span>
                    </label>
                    <input name="city" class="w-full border px-4 py-2 lg:w-1/2" type="text" placeholder="Ville" value="{{auth()->user()->customer->city}}" />
                    @error('ville')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="mt-4 w-40 bg-violet-900 px-4 py-2 text-white">
                    Save changes
                </button>
            </form>
        </div>
    </section>
    <!-- /form  -->
    </section>

@endsection
