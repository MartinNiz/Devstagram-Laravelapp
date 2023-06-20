@extends('layouts.app')

@section('title')
    Login
@endsection


@section('content')
    <div class="md:flex justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="image login user">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                    <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember" class="text-gray-500 text-sm">Remember user</label>
                </div>


                @if(session('message'))
                  <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2 mb-5">{{ session('message') }}</p>
                @endif

                <input type="submit" value="Login" class="bg-sky-600 hover:bg-sky-700 trasiton-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection