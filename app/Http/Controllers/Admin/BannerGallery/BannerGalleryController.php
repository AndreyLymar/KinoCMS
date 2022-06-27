<?php

namespace App\Http\Controllers\Admin\BannerGallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerGallery\BgImgBanner\StoreRequest;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;

class BannerGalleryController extends Controller
{
    public function index()
    {
        $home_page_galleries = HomePageGallery::all();
        $home = HomePage::first();
        $news_special_offers = NewsSpecialOfferGallery::all();
        return view('admin.gallery.index', compact('home_page_galleries', 'home', 'news_special_offers'));
    }
}
