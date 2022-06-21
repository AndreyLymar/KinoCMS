<?php

namespace App\Http\Controllers\Admin\BannerGallery\NewsSpecialOfferBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerGallery\NewsSpecialOfferBanner\StoreRequest;
use App\Service\Admin\BannerGallery\NewsSpecialOfferBanner\Service;

class NewsSpecialOfferBannerController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.galleries.index');
    }
}
