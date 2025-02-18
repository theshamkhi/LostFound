<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment($request->all());
        $comment->userID = Auth::id();
        $comment->postID = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment deleted successfully.');
    }
}