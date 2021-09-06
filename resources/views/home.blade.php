@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-5">
        <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Welcome to The BlogX
        </h1>
    </div>

    <div class="mt-10 max-w-xl mx-auto">
        @foreach(\App\Models\Post::all() as $post)
            <div class="border-b mb-5 pb-5 border-gray-200">
                <a href="/post/{{ $post->slug }}" class="text-2xl font-bold mb-2">{{ $post->title }}</a>
                <p>{{ Str::limit($post->body, 100) }}</p>
            </div>
        @endforeach
    </div>
@endsection