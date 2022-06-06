<?php

namespace App\Http\Controllers\Admin\BannerGallery\NewsSpecialOfferBanner;

use App\Http\Requests\Admin\BannerGallery\NewsSpecialOfferBanner\StoreRequest;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use Illuminate\Support\Facades\Storage;

class NewsSpecialOfferBannerController extends BaseController
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.galleries.index');
    }
}
