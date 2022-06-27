<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Hall;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return $request->cinema . ' - ' . $request->schedule_id;
        }
        $films = Film::where('status','already')->get();
        $cinemas = Cinema::all();
//        $halls_schedule = Hall::where();
        $schedules = Schedule::all();
        $halls = Hall::all();
        return view('admin.schedule.index', compact('films', 'cinemas', 'schedules','halls'));
    }
    public function store_or_update(Request $request)
    {

        if($request->ajax()){
            return $request->cinema . ' - ' . $request->schedule_id;
        }
        return view('admin.schedule.index');
    }

}
