<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function toggle(int $id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        return redirect()->back()->with('success', 'Comment has been updated');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id)->remove();

        return redirect()->back()->with('success', 'Comment has been deleted');
    }
}
