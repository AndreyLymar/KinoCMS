<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Page;
use Illuminate\Http\Request;


class FilmController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public function show(Film $film, Request $request)
    {
        if($request->ajax()){
            return $request->select_cinema;
        }
        $cinemas = Cinema::all();
        $select_cinema = Cinema::first();
        $pages = Page::where('status', 1)->get();
        return view('user.film.show', compact('pages', 'film','cinemas', 'select_cinema' ));
    }

}
