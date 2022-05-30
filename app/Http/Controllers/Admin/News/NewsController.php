<?php

namespace App\Http\Controllers\Admin\News;

class NewsController extends BaseController
{
    public function index(){
        return view('admin.news.index');
    }
}
