<?php

namespace App\Http\Controllers\Admin\Page;

use App\Models\ContactPage;
use App\Models\HomePage;
use App\Models\Page;

class PageController extends BaseController
{
    public function index(){
        $home = HomePage::first();
        $pages = Page::all();
        $contact = ContactPage::first();
        return view('admin.page.index', compact('home', 'pages', 'contact'));
    }
    public function create(){
        return view('admin.page.create');
    }
}
