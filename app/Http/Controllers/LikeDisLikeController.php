<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\LikeDisLike;
use Illuminate\Support\Facades\Auth;


class LikeDisLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($post_id){

        $user_id = Auth::user()->id;
        
        $isExit = LikeDisLike::where('post_id',$post_id)->where('user_id',$user_id)->first();
        
        if($isExit){
            
            if($isExit->type == 'like'){
                return back();
            }else{
                LikeDisLike::where('id',$isExit->id)->update([
                    'type' => 'like',
                ]);
            }

            return back();
        }else{
            LikeDisLike::create([
                'user_id' => $user_id ,
                'post_id' => $post_id,
                'type' => 'like',
            ]);

            return back();
        }

    }

    public function dislike($post_id){

        $user_id = Auth::user()->id;
        
        $isExit = LikeDisLike::where('post_id',$post_id)->where('user_id',$user_id)->first();
        
        if($isExit){

            if($isExit->type == 'dislike'){
                return back();
            }else{
                LikeDisLike::where('id',$isExit->id)->update([
                    'type' => 'dislike',
                ]);
            }

            return back();
        }else{
            LikeDisLike::create([
                'user_id' => $user_id ,
                'post_id' => $post_id,
                'type' => 'dislike',
            ]);

            return back();
        }

    }
}
