@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $post->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="categoryID">Category</label>
            <select name="categoryID" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->categoryID == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $post->date }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $post->location }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="contact">Contact Information</label>
            <input type="text" name="contact" class="form-control" value="{{ $post->contact }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection