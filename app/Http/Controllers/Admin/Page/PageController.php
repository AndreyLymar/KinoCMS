<?php

namespace App\Http\Controllers\Admin\Page;

class PageController extends BaseController
{
    public function index(){
        return view('admin.page.index');
    }
}
