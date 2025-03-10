<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    public function index(Request $request){

        $categoryID = $request->query('category');

        $query = Post::with('user', 'category')->latest();

        if ($categoryID) {
            $query->where('categoryID', $categoryID);
        }

        $posts = $query->paginate(9);

        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }
    

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'categoryID' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'location' => 'required|string',
            'contact' => 'required|string',
        ]);

        $post = new Post();
        $post->userID = Auth::id();
        $post->categoryID = $request->categoryID;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->date = $request->date;
        $post->location = $request->location;
        $post->contact = $request->contact;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $post->photo = $photoPath;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->load('user', 'category', 'comments.user');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'categoryID' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'location' => 'required|string',
            'contact' => 'required|string',
        ]);

        $post->categoryID = $request->categoryID;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->date = $request->date;
        $post->location = $request->location;
        $post->contact = $request->contact;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $post->photo = $photoPath;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}