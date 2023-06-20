@extends('layouts.app')

@section('title')
    Sign up
@endsection


@section('content')
    <div class="md:flex justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="image sign up user">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('signup') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    @error('name')
                        <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                    @error('username')
                    <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Comfirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Comfirm Password" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" value="Create acount" class="bg-sky-600 hover:bg-sky-700 trasiton-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection