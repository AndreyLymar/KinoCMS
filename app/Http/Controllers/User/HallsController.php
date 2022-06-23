<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Page;


class HallsController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public function show(Hall $hall)
    {
        $pages = Page::where('status', 1)->get();
        return view('user.hall.show', compact('pages', 'hall'));
    }

}
