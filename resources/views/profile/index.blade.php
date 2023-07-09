@extends('layouts.app')


@section('title', 'Edit Profile: ' . auth()->user()->username)


@section('content')
  <div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
      <form class="mt-10 md:mt-0" method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
          <input type="username" id="username" name="username" placeholder="Username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">
          @error('username')
          <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">Profile image</label>
          <input type="file" id="image" name="image" placeholder="image" class="border p-3 w-full rounded-lg @error('image') border-red-500 @enderror" >
          @error('image')
          <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
          <input type="password" id="password" name="password" placeholder="password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" >
          @if(session('message'))
          <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2 mb-5">{{ session('message') }}</p>
          @endif
        </div>



        <input type="submit" value="Save changes" class="bg-sky-600 hover:bg-sky-700 trasiton-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
    
      </form>
    </div>
  </div>
@endsection