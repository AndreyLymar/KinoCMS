<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Page;
use App\Models\SpecialOffer;


class NewsController extends Controller
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
        $news = News::where('status',1)->get();
        return view('user.news.index', compact('pages', 'news'));
    }

    public function show(News $news)
    {
        $pages = Page::where('status', 1)->get();
        return view('user.news.show', compact('pages', 'news'));
    }

}
