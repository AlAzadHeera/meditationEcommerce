<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('BackendPages.Posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('BackendPages.Posts.create',compact('categories'));
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
            'title'            => 'required',
            'author'           => 'required',
            'category'         => 'required',
            'blog_details'     => 'required',
            'fImage'           => 'required',
            'publish'          => 'required',
        ]);

        $image = $request->fImage;
        $slug = Str::slug($request->title);

        if (isset($image)){
            $imagename = $image;
        }else{
            $imagename = 'default.png';
        }

        $post = new Post();
        $post->title    = $request->title;
        $post->slug     = $slug;
        $post->author   = $request->author;
        $post->category = $request->category;
        $post->post     = $request->blog_details;
        $post->fImage   = $request->fImage;
        $post->publish  = $request->publish;

        $post->save();

        Toastr::success('success','Product Added Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('BackendPages.Posts.update',compact('post','categories'));
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
        $this->validate($request,[
            'title'            => 'required',
            'author'           => 'required',
            'category_id'      => 'required',
            'blog_details'     => 'required',
            'fImage'           => 'required',
            'publish'          => 'required',
        ]);

        $post = Post::find($id);

        $slug = Str::slug($request->title);

        if (isset($image)){
            $imagename = $request->fImage;
        }else{
            $imagename = $post->fImage;
        }

        $post->title    = $request->title;
        $post->slug     = $slug;
        $post->author   = $request->author;
        $post->category = $request->category;
        $post->post     = $request->blog_details;
        $post->fImage   = $imagename;
        $post->publish  = $request->publish;

        $post->save();

        Toastr::success('success','Product Updated Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Post::find($id);

        $product->delete();

        Toastr::success('success','Post Deleted Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
