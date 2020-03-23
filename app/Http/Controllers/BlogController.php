<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function gridView(){
        $posts = Post::all();
        $categories = Category::all();
        return view('FrontendPages.Blog.blogGrid',compact('posts','categories'));
    }

    public function listView(){
        $posts = Post::all();
        $categories = Category::all();
        return view('FrontendPages.Blog.blogList',compact('posts','categories'));
    }

    public function detailsView($slug){
        $post = DB::table('posts')->where('slug', $slug)->first();
        $categories = Category::all();
        return view('FrontendPages.Blog.blogDetails',compact('post','categories'));
    }

    public function postByCategory($id){
        $posts = Category::find($id)->post;
        $categories = Category::all();
        return view('FrontendPages.Blog.blogGrid',compact('posts','categories'));
    }
}
