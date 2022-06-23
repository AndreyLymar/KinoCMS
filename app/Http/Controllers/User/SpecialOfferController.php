<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Page;
use App\Models\SpecialOffer;


class SpecialOfferController extends Controller
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
        $special_offers = SpecialOffer::where('status',1)->get();
        return view('user.special_offer.index', compact('pages', 'special_offers'));
    }

    public function show(SpecialOffer $special_offer)
    {
        $pages = Page::where('status', 1)->get();
        return view('user.special_offer.show', compact('pages', 'special_offer'));
    }

}
