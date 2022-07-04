<?php

namespace App\Service\User\Schedule;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Hall;
use App\Models\Page;
use App\Models\Schedule;
use App\Models\Seat;
use Illuminate\Support\Facades\Validator;

class Service
{
    public function index($request)
    {

        $films = Film::where('status', 'already')->get();
        $cinemas = Cinema::all();
        $dateSchedulesGroups = Schedule::orderBy('date', 'asc')->get()->groupBy('date');
        $halls = Hall::all();
        $pages = Page::where('status', 1)->get();

        if ($request->ajax()) {
            if ($request->filter) {
                $halls_id = null;
                if (isset($request->cinema)) {
                    $cinema = Cinema::find($request->cinema);
                    foreach ($cinema->halls as $hall) {
                        $halls_id[] = $hall->id;
                    }
                }

                $type = null;
                if (isset($request->type_2d)) {
                    $type[] = $request->type_2d;
                }
                if (isset($request->type_3d)) {
                    $type[] = $request->type_3d;
                }
                if (isset($request->type_imax)) {
                    $type[] = $request->type_imax;
                }
                $hall_id = $request->hall ?? null;
                $film_id = $request->film ?? null;
                $date = $request->date ?? null;

                $dateSchedulesGroups = Schedule::when($halls_id, function ($query, $halls_id) {
                    $query->whereIn('hall_id', $halls_id);
                })->when($hall_id, function ($query, $hall_id) {
                    $query->where('hall_id', $hall_id);
                })->when($film_id, function ($query, $film_id) {
                    $query->where('film_id', $film_id);
                })->when($type, function ($query, $type) {
                    $query->whereIn('type', $type);
                })->when($date, function ($query, $date) {
                    $query->where('date', $date);
                })->orderBy('date', 'asc')->get()->groupBy('date');
                return view('user.schedule.ajax.schedule_show', compact('dateSchedulesGroups'))->render();
            }
            if ($request->cinema == 0) {
                return null;
            } else {
                $cinema_select = Cinema::find($request->cinema);
                return view('user.schedule.ajax.new_hall', compact('cinema_select'))->render();
            }
        }
        return view('user.schedule.index', compact('films', 'cinemas', 'dateSchedulesGroups', 'halls', 'pages'));
    }


    public function show($schedule, $request){
        $pages = Page::all();
        $seats = $schedule->seats;


        if ($request->ajax()) {
            $seats_id = $request->seats_id;

            if ($request->action === 'reservationSeats') {
                for ($i = 0; $i < count($seats_id); $i++) {
                    $seat = Seat::find($seats_id[$i]);
                    if($seat->user_id === null){
                        $seat->update([
                            'status' => 1,
                            'user_id' => $request->user_id,
                        ]);
                    }
                }
                $schedule = Schedule::find($schedule->id);
                return view('user.schedule.ajax.choose_seats', compact('schedule'));
            }

            if ($request->action === 'cancelReservationSeats') {
                for ($i = 0; $i < count($seats_id); $i++) {
                    $seat = Seat::find($seats_id[$i]);
                    $seat->update([
                        'status' => 0,
                        'user_id' => null,
                    ]);
                }
                $schedule = Schedule::find($schedule->id);
                return view('user.schedule.ajax.choose_seats', compact('schedule'));
            }

            if (!empty($seats_id)) {
                $sum = $schedule->price * count($seats_id);
                $count = count($seats_id);

                $result = [
                    'count' => $count,
                    'sum' => $sum
                ];
                return $result;
            } else {
                return null;
            }

        }
        return view('user.schedule.show', compact('schedule', 'pages'));
    }
}
