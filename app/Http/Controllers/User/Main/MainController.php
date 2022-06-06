<?php

namespace App\Http\Controllers\User\Main;

use App\Models\City;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;
use App\Models\User;


class MainController extends BaseController
{
    public function index(){
        $homepage = HomePage::first();
        $home_page_galleries = HomePageGallery::all();
        $news_special_offers = NewsSpecialOfferGallery::all();
        return view('user.main.index',compact('homepage', 'news_special_offers','home_page_galleries'));
    }

    public function show(){

    }
    public function redirect(){
        return redirect()->route('user.main.index');
    }

}
