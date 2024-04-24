@extends('layouts.profile')
@section('title', 'Edit Password')
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

            <form class="flex w-full flex-col gap-3" action="{{ route('profile.update-password') }}" method="POST">
                @csrf

                <div class="flex w-full flex-col">
                    <label class="flex" for="name">Current password<span
                            class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>

                    <input name="current_password" class="w-full border px-4 py-2 lg:w-1/2" type="password"
                        placeholder="" />
                    @error('current_password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex w-full flex-col">
                    <label class="flex" for="name">New Password<span
                            class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                    <input name="password" class="w-full border px-4 py-2 lg:w-1/2" type="password" placeholder="" />
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="flex" for="">Repeat New Password<span
                            class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                    <input name="password_confirmation" class="w-full border px-4 py-2 lg:w-1/2" type="password"
                        placeholder="" />
                    @error('password_confirmation')
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
