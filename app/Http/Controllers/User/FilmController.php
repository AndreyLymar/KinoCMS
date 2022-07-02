<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Page;
use App\Service\User\Film\Service;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function show(Film $film, Request $request)
    {
        return $this->service->show($film, $request);
    }

}
