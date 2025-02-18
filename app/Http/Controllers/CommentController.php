<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Debugging: Log the postID and content
        Log::info('Creating comment for post:', [
            'postID' => $post->id,
            'content' => $request->content,
        ]);

        $comment = new Comment();
        $comment->userID = Auth::id(); // Set the authenticated user's ID
        $comment->postID = $post->id;  // Set the postID from the route parameter
        $comment->content = $request->content; // Set the comment content
        $comment->save(); // Save the comment

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully!');
    }

    // Delete a comment
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }
}