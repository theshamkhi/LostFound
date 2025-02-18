@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p><strong>Location:</strong> {{ $post->location }}</p>
    <p><strong>Date:</strong> {{ $post->date }}</p>
    <p><strong>Contact:</strong> {{ $post->contact }}</p>

    <h2>Comments</h2>
    @foreach ($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <small>By {{ $comment->user->name }} on {{ $comment->created_at }}</small>
            </div>
        </div>
    @endforeach

    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection