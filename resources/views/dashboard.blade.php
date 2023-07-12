@extends('layouts.app')

@section('title', 'Profile: ' . $user->username)

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg;w-6/12 flex flex-col items-center md:flex-row">
      <div class="w-8/12 lg:w-6/12 px-5">
        <img class="w-full md:w-8/12 flex justify-center md:ml-auto" src="{{ $user->image ? asset('profiles') . '/' . $user->image :  asset('img/usuario.svg') ; }}" alt="imagen usuario">
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
        <div class="flex items-center gap-2">
          <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
          @auth
            @if ($user->id === auth()->user()->id )
              <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                </svg>                            
              </a>
            @endif
          @endauth
        </div>

        <p class="text-gray-700 text-sm mb-3 font-bold mt-5">{{ $user->followers->count() }} <span class="font-normal">@choice('Follower|Followers', $user->followers->count())</span></p>
        <p class="text-gray-700 text-sm mb-3 font-bold">{{ $user->followings->count() }}  <span class="font-normal">Followins</span></p>
        <p class="text-gray-700 text-sm mb-3 font-bold">{{ $user->posts->count() }} <span class="font-normal">Posts</span></p>

        @auth
          @if ($user->id !== auth()->user()->id)
            @if ( !$user->following( auth()->user() ))
              <form action="{{ route('users.follow', $user) }}" method="POST">
                @csrf
                <input type="submit" class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Follow">
              </form>
            @else     
              <form action="{{ route('users.unfollow', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Unfollow">
              </form>
            @endif
          @endif
        @endauth

      </div>
    </div>
  </div>
  <section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Posts</h2>

    <x-post-card :posts="$posts" > 
      <x-slot:no-post>
        @if (auth()->id() == $user->id)
        <a href="{{ route('posts.create') }}">
        @endif
          <div class="border-solid border-2 border-gray-500 rounded-full flex flex-col items-center justify-center w-64 h-64 mx-auto">
            <div class="flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
              </svg>      
            </div>
            <p class="text-gray-600 uppercase text-center font-bold text-lg">No posts</p>
          </div>      
        @if (auth()->id() == $user->id)
        </a>
        @endif
      </x-slot:noPost>
    </x-post-card>



  </section>
@endsection