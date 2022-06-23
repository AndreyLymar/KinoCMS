<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;
use App\Models\Page;
use App\Service\User\Main\Service;


class MainController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $homepage = HomePage::first();
        $pages = Page::where('status', 1)->get();
        $home_page_galleries = HomePageGallery::all();
        $news_special_offers = NewsSpecialOfferGallery::all();
        return view('user.main.index', compact('homepage', 'news_special_offers', 'home_page_galleries', 'pages'));
    }

    public function show()
    {

    }

    public function redirect()
    {
        return redirect()->route('user.main.index');
    }

}
