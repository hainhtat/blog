<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'body' => 'required',
            'user_id' => 'required',
            'article_id' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;
        $comment->article_id = $request->article_id;
        $comment->save();
        return back();

    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
