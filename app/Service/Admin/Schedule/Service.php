<?php

namespace App\Service\Admin\Schedule;

use App\Jobs\CreateSeatsToSchedule;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Hall;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Service
{
    public function index($request){
        $all_schedules = Schedule::all();
        foreach ($all_schedules as $schedule) {
            if ($schedule->date <= date('Y-m-d')) {
                $schedule->delete();
            }
        }
        $films = Film::where('status', 'already')->get();
        $cinemas = Cinema::all();
        $schedules = Schedule::latest()->paginate(5);
        $halls = Hall::all();

        if ($request->ajax()) {
            if(isset($request->film)){
                $film_select = Film::find($request->film);
                return view('admin.schedule.ajax.new_film_type', compact('film_select'))->render();
            }
            if ($request->cinema == 0) {
                return null;
            } else {
                $cinema_select = Cinema::find($request->cinema);
                return view('admin.schedule.ajax.new_hall', compact('cinema_select'))->render();
            }
        }
        return view('admin.schedule.index', compact('films', 'cinemas', 'schedules', 'halls'));
    }

    public function updateOrCreate($request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|int',
            'cinema' => 'required|string',
            'film' => 'required|string',
            'hall' => 'required|int',
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required',
        ]);
        $validated = $validator->validated();

        $schedule_id = $request->schedule_id == 'New' ? null : $request->schedule_id;
        Schedule::updateOrCreate(['id' => $schedule_id], [
            'price' => $request->price,
            'film_id' => $request->film,
            'hall_id' => $request->hall,
            'date' => $request->date,
            'time' => $request->time,
            'type' => $request->type,
        ]);

        if ($schedule_id === null) {
            $schedules = Schedule::all();
            $schedule = $schedules->last();

            dispatch(new CreateSeatsToSchedule($schedule));
        }
        if ($request->ajax()) {
            return $validated;
        }
    }

    public function filter($request)
    {
        if ($request->ajax()) {
            if (!empty($request->hall)) {
                $data[] = ['hall_id', $request->hall];
            }
            if (!empty($request->film)) {
                $data[] = ['film_id', $request->film];
            }
            if (!empty($request->date)) {
                $data[] = ['date', $request->date];
            }
            if (!empty($request->time)) {
                $data[] = ['time', $request->time];
            }
            if (!empty($request->priceBefore)) {
                $data[] = ['price', '<=', $request->priceBefore];
            }
            if (!empty($request->priceFrom)) {
                $data[] = ['price', '>=', $request->priceFrom];
            }
            if (!empty($request->type)) {
                $data[] = ['type', $request->type];
            }

            $schedules = !empty($data) ? Schedule::where($data)->latest()->paginate(5) : Schedule::latest()->paginate(5);

            if (!empty($request->cinema)) {


                $cinema = Cinema::find($request->cinema);
                foreach ($cinema->halls as $hall) {
                    $dataCinema[] = $hall->id;
                }
                $schedules = !empty($data) ? Schedule::where($data)->whereIn('hall_id', $dataCinema)->latest()->paginate(5) : Schedule::whereIn('hall_id', $dataCinema)->latest()->paginate(5);

            }
            $films = Film::where('status', 'already')->get();
            $cinemas = Cinema::all();
            $halls = Hall::all();
            return view('admin.schedule.ajax.schedule_show', compact('films', 'cinemas', 'schedules', 'halls'))->render();
        }
    }

}
