<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;
use App\Models\Page;
use App\Service\User\Main\Service;


class CinemasController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public function index()
    {
        $pages = Page::where('status', 1)->get();
        $cinemas = Cinema::all();
        return view('user.cinema.index', compact('pages', 'cinemas'));
    }

    public function show(Cinema $cinema)
    {
        $pages = Page::where('status', 1)->get();
        return view('user.cinema.show', compact('pages', 'cinema'));
    }

}
