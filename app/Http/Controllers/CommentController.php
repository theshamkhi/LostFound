<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->userID = Auth::id();
        $comment->postID = $post->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}