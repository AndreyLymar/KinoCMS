<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Page;


class PageController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }
    public function show(Page $page)
    {
        $pages = Page::where('status', 1)->get();
        return view('user.page.show', compact('pages', 'page'));
    }

}
