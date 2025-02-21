@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-xl border border-gray-300 p-8">
        <h1 class="text-4xl font-extrabold text-blue-700 text-center mb-4 drop-shadow-lg">{{ $post->title }}</h1>

        @if ($post->photo)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $post->photo) }}" class="w-full h-56 object-cover" alt="{{ $post->title }}">
            </div>
        @endif

        <p class="text-gray-700 mb-6">{{ $post->description }}</p>
        @if(auth()->check() && auth()->user()->id == $post->userID)
            <div class="mb-4 flex justify-start gap-4">
                <a href="{{ route('posts.edit', $post) }}" class="px-8 py-2 bg-yellow-500 text-white text-sm font-bold rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                    Edit
                </a>
        
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-8 py-2 bg-red-500 text-white text-sm font-bold rounded-lg shadow-md hover:bg-red-600 transition duration-300">
                        Delete
                    </button>
                </form>
            </div>
        @endif
        <div class="mb-6 space-y-2">
            <p class="text-gray-600"><strong>Location:</strong> {{ $post->location }}</p>
            <p class="text-gray-600"><strong>Date:</strong> {{ $post->date }}</p>
            <p class="text-gray-600"><strong>Contact:</strong> {{ $post->contact }}</p>
        </div>

        <h2 class="text-2xl font-bold text-blue-700 mb-4">Comments</h2>
        <div class="space-y-4 mb-6">
            @foreach ($post->comments as $comment)
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm">
                    <p class="text-gray-700">{{ $comment->content }}</p>
                    <small class="text-gray-500 block mt-2">By {{ $comment->user->name }} on {{ $comment->created_at }}</small>
                </div>
            @endforeach
        </div>

        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div class="mb-4">
                <textarea name="content" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Add a comment"></textarea>
            </div>
            <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white text-lg font-bold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
