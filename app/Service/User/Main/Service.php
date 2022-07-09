<?php

namespace App\Service\User\Main;

use App\Models\Device;
use App\Models\Film;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;
use App\Models\Page;
use Mobile_Detect;

class Service
{
    public function index(){
        $homepage = HomePage::first();
        $pages = Page::where('status', 1)->get();
        $home_page_galleries = HomePageGallery::all();
        $news_special_offers = NewsSpecialOfferGallery::all();
        $films_already = Film::where('status', 'already')->get();
        $films_soon = Film::where('status', 'soon')->get();


        $detect = new Mobile_Detect;
        $detect = $detect->isMobile() ? 'modile' : 'desktop';
        $ip = request()->ip();
        $date = date('Y-m-d');
        Device::firstOrCreate([
            'ip' => $ip,
            'type' => $detect,
            'date' => $date
        ]);

        return view('user.main.index', compact('homepage', 'news_special_offers', 'home_page_galleries', 'pages', 'films_already', 'films_soon'));
    }
}
