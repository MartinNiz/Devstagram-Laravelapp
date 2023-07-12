@extends('layouts.app')

@section('title', 'Main page')

@section('content')
  {{-- post component --}}
  <x-post-card :posts="$posts">
    <x-slot:no-post>
      <p class="text-center">No posts</p>
    </x-slot:noPost>
  </x-post-card>

@endsection