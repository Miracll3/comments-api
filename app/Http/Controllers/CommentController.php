<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
        ]);

        return response()->json([
            'message' => 'Comment created successfully',
            'comment' => $comment,
        ], 201);
    }

    public function index()
    {
        $comments = Comment::all();

        return response()->json([
            'comments' => $comments,
        ], 200);
    }
}
