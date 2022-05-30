<?php

namespace App\Http\Controllers\Admin\Cinema;

class CinemaController extends BaseController
{
    public function index(){
        return view('admin.cinema.index');
    }
}
