<?php

namespace App\Http\Controllers\Admin\BannerGallery;

class BannerGalleryController extends BaseController
{
    public function index(){
        return view('admin.gallery.index');
    }
}
