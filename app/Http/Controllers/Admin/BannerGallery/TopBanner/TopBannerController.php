<?php

namespace App\Http\Controllers\Admin\BannerGallery\TopBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerGallery\TopBanner\StoreRequest;
use App\Service\Admin\BannerGallery\TopBanner\Service;

class TopBannerController extends Controller
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
