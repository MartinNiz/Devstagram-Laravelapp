<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
    <title>Devstagram - @yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

  </head>
  <body class="bg-gray-50">
    <header class="p-5 border-b bg-gray-50 shadow">
      <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-3xl text-black">Devstagram</a>
        <nav class="flex gap-2 items-center">
          @auth
          <a class="flex items-center gap-2 bg-white border p-2 text-gray-700 rounded text-sm uppercase font-bold" href="{{ route('posts.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>          
            Create
          </a>
          <a class="font-bold text-black text-sm" href="{{ route('posts.index', auth()->user()->username) }}">Hello: <span class="font-normal">{{ auth()->user()->name }}</span></a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="font-bold uppercase text-black text-sm" type="submit">Logout</button>
          </form>
          @endauth

          @guest
          <a class="font-bold uppercase text-black text-sm" href="{{ route('login') }}">Login</a>
          <a class="font-bold uppercase text-black text-sm text-" href="{{ route('signup') }}">Create acount</a>
          @endguest

        </nav>
      </div>
    </header>
    <div class="container mx-auto mt-10">
      <h2 class="text-black text-center text-3xl mb-10 font-bold">@yield('title')</h2>  
      
      @yield('content')
    
    </div>
    <footer class="text-center p-5 text-black font-bold uppercase mt-10">
      Devstagram - ALL RIGHTS RESERVED
    </footer>
  </body>
</html>
