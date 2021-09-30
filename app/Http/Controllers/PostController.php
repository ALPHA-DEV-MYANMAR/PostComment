<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post,App\Models\Category,App\Models\LikeDisLike,App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $categories = Category::all();

         return view('UI.createpost',compact('categories'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'content' => 'required',

        ]);
 

        $image = $request->file('image');
        $OriginalName = uniqid().'_'.$image->getClientOriginalName();
        $path = 'upload/';
        $image->move($path,$OriginalName);

        $posts = Post::create([
            'title' => $request->title,
            'image' => $OriginalName,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        return back()->with('message','Successfully Upload Post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {

        $post = Post::find($post_id);
        $contents = Comment::where('post_id',$post_id)->get();
        $likes = LikeDislike::where('post_id',$post_id)->where('type','like')->get();
		$dislikes = LikeDislike::where('post_id',$post_id)->where('type','dislike')->get();
        $likestatus = LikeDislike::where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
        
		
        return view('UI.showdetail',compact('post','likes','dislikes','likestatus','contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
