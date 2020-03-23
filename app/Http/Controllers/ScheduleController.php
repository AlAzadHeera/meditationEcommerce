<?php

namespace App\Http\Controllers;

use App\Schedule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FrontendPages.schedule');
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
           'name' => 'required',
           'address' => 'required',
           'mobile' => 'required',
           'email' => 'required',
           'service' => 'required',
           'time' => 'required'
        ]);

        $schedule = new Schedule();
        $schedule->name = $request->name;
        $schedule->address = $request->address;
        $schedule->email = $request->email;
        $schedule->mobile = $request->mobile;
        $schedule->service = $request->service;
        $schedule->time = $request->time;

        $schedule->save();

        Toastr::success('success','Appointment Set Successfully!',['positionClass'=>'toast-top-right']);

        return redirect()->route('schedule.index');


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
        //
    }
}
