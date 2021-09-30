<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$post_id){

        $user_id = Auth::user()->id;

        $this->validate($request,[
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'content' => $request->comment,
        ]);

        return back();
    }
}
