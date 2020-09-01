@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="text-6xl mb-8">All Posts</h1>
        <span
            class="text-3xl font-bold text-red-600">
                Current user id : {{Auth::user()->id}}
        </span>
        <div class="py-3 my-8 w-1/2 mx-auto">
            @foreach ($posts as $post)
                <div class="my-4 py-2">
                    <span>
                        <span
                        class="font-bold text-blue-700"
                        >
                        author id:</span> {{ $post->user->id ?? '' }}
                    </span>
                    <h3 class="my-3">
                        <span
                        class="font-bold text-blue-700"
                        >title:</span> {{ $post->title }}
                    </h3>
                    <p>{{ $post->body }}</p>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@endsection
