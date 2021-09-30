<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post,App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request){

        $categories = Category::all();
        $search_data = $request['search_data'];
        $posts = Post::where('title','like','%'.$search_data.'%')->
        orWhere('content','like','%'.$search_data.'%')->
        get();

        return view('home',compact('posts','categories'));
    }

    public function search_category($cat_name){

        $categories = Category::all();
        $posts = Post::where('category','=',$cat_name)->get();
        
        return view('home',compact('posts','categories'));  

    }
}
