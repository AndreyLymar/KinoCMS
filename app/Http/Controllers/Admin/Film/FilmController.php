<?php

namespace App\Http\Controllers\Admin\Film;

class FilmController extends BaseController
{
    public function index(){
        return view('admin.film.index');
    }
}
