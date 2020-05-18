<?php

namespace App\Http\Controllers;

use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('ban');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'int',
            'text' => 'required|max:10000'
        ]);

        $comment = Comment::add($request->all(), Auth::user()->id);

        return redirect()->back()->with('success', 'Your comment will appear soon');
    }
}
