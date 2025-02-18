@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lost & Found</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($post->photo)
                        <img src="{{ asset('storage/' . $post->photo) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection