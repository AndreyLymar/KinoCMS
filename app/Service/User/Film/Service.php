<?php

namespace App\Service\User\Film;

use App\Models\Cinema;
use App\Models\Page;

class Service
{
    public function show($film, $request){
        $cinemas = Cinema::all();
        $select_cinema = Cinema::first();
        $pages = Page::where('status', 1)->get();

        if($request->ajax()){
            $select_cinema = Cinema::find($request->cinema);
            return view('user.film.ajax.schedules_for_cinema', compact('select_cinema', 'film','cinemas'));
        }
        return view('user.film.show', compact('pages', 'film','cinemas', 'select_cinema' ));
    }
}
