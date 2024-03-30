<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(10);

        return view('admin.comments', compact('comments'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted Successfully');
    }
}
