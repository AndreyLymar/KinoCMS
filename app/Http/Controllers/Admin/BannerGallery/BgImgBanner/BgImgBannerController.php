<?php

namespace App\Http\Controllers\Admin\BannerGallery\BgImgBanner;

use App\Http\Requests\Admin\BannerGallery\BgImgBanner\UpdateRequest;
use App\Models\HomePage;
use Illuminate\Support\Facades\Storage;

class BgImgBannerController extends BaseController
{
    public function update(UpdateRequest $request, HomePage $home){
        $data = $request->validated();
        return $this->service->update($data, $home);
    }
}
