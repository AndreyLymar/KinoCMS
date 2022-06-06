<?php

namespace App\Http\Controllers\Admin\BannerGallery\TopBanner;

use App\Http\Controllers\Controller;
use App\Service\Admin\BannerGallery\TopBanner\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
