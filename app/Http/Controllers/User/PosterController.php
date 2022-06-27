<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;
use App\Models\Page;
use App\Service\User\Main\Service;


class PosterController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public function index($status)
    {
        $pages = Page::where('status', 1)->get();
        $films = Film::where('status', $status)->get();
        return view('user.poster.index', compact('pages', 'films'));
    }

    public function show()
    {

    }

}
