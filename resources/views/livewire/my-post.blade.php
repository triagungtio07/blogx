<div>
    <div class="container mx-auto p-5">
        <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Welcome to {{ session('name') }}'s Post
        </h1>
    </div>

    <div class="mt-10 max-w-xl mx-auto">
        @foreach($posts as $post)
            <div class="border-b mb-5 pb-5 border-gray-200">
                <div class="ml-auto object-right-top">
                    hei
                </div>
                <a href="/post/{{ $post->slug }}" class="text-2xl font-bold mb-2">{{ Str::limit($post->title, 20, '...') }}</a>
                <p class="truncate">{{ Str::limit($post->body, 100) }}</p>
                <p> ~ {{ $post->name }}</p>
            </div>
        @endforeach
    </div>
</div>
