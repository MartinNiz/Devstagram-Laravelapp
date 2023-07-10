@extends('layouts.app')

@section('title', 'Main page')

@section('content')

  @if ($posts->count())
  
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($posts as $post)
      <div>
        <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
          <img src="{{ asset('uploads') . '/' . $post->image}}" alt="post image {{$post->title}}">
        </a>
      </div>
      @endforeach
    </div>

    <div class="my-10">
      {{ $posts->links('pagination::tailwind') }}
    </div>

  @else
    <p class="text-center">No posts</p>
  @endif

@endsection