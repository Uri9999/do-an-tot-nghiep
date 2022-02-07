<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function addComment(Request $request) {
        $comment = new Comment;
        $comment->user_name = Auth::user()->name;
        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->save();
        return redirect()->back();
    } 

}
