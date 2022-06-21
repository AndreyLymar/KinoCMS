<?php

namespace App\Http\Controllers\Admin\BannerGallery\BgImgBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerGallery\BgImgBanner\UpdateRequest;
use App\Models\HomePage;
use App\Service\Admin\BannerGallery\BgImgBanner\Service;

class BgImgBannerController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function update(UpdateRequest $request, HomePage $home)
    {
        $data = $request->validated();
        return $this->service->update($data, $home);
    }
}
