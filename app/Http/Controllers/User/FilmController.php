<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\News;
use App\Models\Page;


class FilmController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public function show(Film $film)
    {
        $cinemas = Cinema::all();
        $pages = Page::where('status', 1)->get();
        return view('user.film.show', compact('pages', 'film','cinemas'));
    }

}
