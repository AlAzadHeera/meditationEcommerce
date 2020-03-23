<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Video::all();
        return view('BackendPages.Videos.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackendPages.Videos.create');
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
            'title'       => 'required',
            'description' => 'required',
            'file'        => 'mimes: avi,flv,wmv,mov,mp4'
        ]);

        $video = $request->file('video');
        $slug = Str::slug($request->title,'-');

        if (isset($video)){
            $currentDate =  Carbon::now()->toDateString();
            $videoname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$video->getClientOriginalExtension();

            if (!file_exists('uploads/video')){
                mkdir('uploads/video',007,true);
            }else{
                $video->move('uploads/video',$videoname);
            }

        }else{
            $videoname = 'Uploaded Video';
        }

        $uVedio = new Video();
        $uVedio->title = $request->title;
        $uVedio->description = $request->description;
        $uVedio->file = $videoname;
        $uVedio->link = $request->link;
        $uVedio->save();
        Toastr::success('success','Video Uploaded Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->route('video.index');
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
        $file = Video::find($id);
        if (file_exists('uploads/video/'.$file->file)){
            unlink('uploads/video/'.$file->file);
        }
        $file->delete();
        Toastr::success('success','Video Deleted Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
