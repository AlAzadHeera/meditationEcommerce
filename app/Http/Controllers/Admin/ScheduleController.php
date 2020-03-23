<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index(){
        $incompleteSchedules = DB::table('schedules')
            ->where('status','=', 0)
            ->get();
        $completeSchedules = DB::table('schedules')
            ->where('status','=', 1)
            ->get();
        return view('BackendPages.Schedule.index',compact('incompleteSchedules','completeSchedules'));
    }

    public function markAsDone($id){
        DB::table('schedules')
            ->where('id', $id)
            ->update( ['status' => 1]);

        Toastr::success('success','Marked As Done!',['positionClass'=>'toast-top-right']);
        return redirect()->route('adminSchedule');
    }

    public function markAsUnDone($id){
        DB::table('schedules')
            ->where('id', $id)
            ->update( ['status' => 0]);

        Toastr::success('success','Marked As Incomplete!',['positionClass'=>'toast-top-right']);
        return redirect()->route('adminSchedule');
    }

    public function deleteSchedule($id){
        $orderNo = Schedule::find($id);
        $orderNo->delete();

        Toastr::success('success','Schedule Deleted Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
