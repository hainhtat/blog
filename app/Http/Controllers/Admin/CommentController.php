<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

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
        if(Gate::allows('comment-delete', $comment)){
            $comment->delete();
            return back()->with('success', 'Comment deleted successfully');
        }
        else{
            return back()->with('error', 'You are not authorized to delete this comment');
        }
    }
}
