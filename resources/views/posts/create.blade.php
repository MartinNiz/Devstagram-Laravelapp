@extends('layouts.app')
@section('title', 'Create post')

@push('styles')
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
  <div class="md:flex md:items-center">
    <div class="md:w-6/12">
      <div class="px-10">
        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dash border-2 w-full h-96 rounded flex flex-col justify-center items-center">
          @csrf
        </form>
      </div>
    </div>
    <div class="md:w-6/12">
      <div class="p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{ route('posts.store') }}" method="POST" novalidate>
          @csrf
          <div class="mb-5">
              <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Title</label>
              <input type="text" id="title" name="title" placeholder="Post title" class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
              @error('title')
                  <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
              @enderror
          </div>
  
          <div class="mb-5">
            <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Description</label>
            <textarea type="text" id="description" name="description" placeholder="Post description" class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-5">
            <input type="hidden" name="image" value="{{ old('image') }}">
            @error('image')
            <p class="bg-red-500 w-full rounded-lg p-2 text-sm text-white mt-2">{{ $message }}</p>
            @enderror
          </div>

          <input type="submit" value="Create post" class="bg-sky-600 hover:bg-sky-700 trasiton-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

        </form>
      </div>
    </div>
  </div>
@endsection