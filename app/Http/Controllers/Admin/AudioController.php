<?php

namespace App\Http\Controllers\Admin;

use App\Audio;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Audio::all();
        return view('BackendPages.Audios.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackendPages.Audios.create');
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
            'title'        => 'required',
            'description' => 'required',
            'file' => 'required | mimes:mpga',
            'image' => 'required | mimes: jpg,jpeg,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if (isset($image)){
            $currentDate =  Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/audio')){
                mkdir('uploads/audio',007,true);
            }else{
                $image->move('uploads/audio',$imagename);
            }

        }else{
            $imagename = 'default.png';
        }

        $audio = $request->file('file');
        $slug = Str::slug($request->title,'-');

        if (isset($audio)){
            $currentDate =  Carbon::now()->toDateString();
            $audioname = $slug.'-'.$currentDate.'-'.uniqid().'.'.$audio->getClientOriginalExtension();

            if (!file_exists('uploads/audio')){
                mkdir('uploads/audio',007,true);
            }else{
                $audio->move('uploads/audio',$audioname);
            }

        }else{
            $audioname = 'default.mp3';
        }

        $audio              = new Audio();
        $audio->title       = $request->title;
        $audio->description = $request->description;
        $audio->file        = $audioname;
        $audio->image       = $imagename;
        $audio->save();
        Toastr::success('success','Audio Uploaded Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->route('audio.index');
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
        $audio = Audio::find($id);
        if (file_exists('uploads/audio/'.$audio->file)){
            unlink('uploads/audio/'.$audio->image);
        }

        if (file_exists('uploads/audio/'.$audio->image)){
            unlink('uploads/audio/'.$audio->image);
        }
        $audio->delete();

        Toastr::success('success','Audio Deleted Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
