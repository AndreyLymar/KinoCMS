<?php

namespace App\Http\Controllers\Admin\BannerGallery;

use App\Http\Controllers\Controller;
use App\Service\Admin\BannerGallery\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
