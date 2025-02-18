@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p>Category: {{ $post->category->name }}</p>
    <p>Location: {{ $post->location }}</p>
    <p>Contact: {{ $post->contact }}</p>

    <h2>Comments</h2>
    <ul>
        @foreach ($post->comments as $comment)
            <li>
                <p>{{ $comment->content }}</p>
                <p>By: {{ $comment->user->name }}</p>
                @if (auth()->id() === $comment->userID)
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
@endsection