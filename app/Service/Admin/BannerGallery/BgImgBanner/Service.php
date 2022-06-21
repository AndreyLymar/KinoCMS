<?php

namespace App\Service\Admin\BannerGallery\BgImgBanner;

use App\Models\HomePage;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function update($data, $home){
        if(!empty($data)) {
            Storage::disk('public')->delete($home->bg_img);
            if (isset($data['bg_img'])) {
                $data['bg_img'] = Storage::disk('public')->put('/images', $data['bg_img']);
            }
            $home->update([
                'bg_img' => $data['bg_img']
            ]);
        }
        return redirect()->route('admin.galleries.index');
    }
}
