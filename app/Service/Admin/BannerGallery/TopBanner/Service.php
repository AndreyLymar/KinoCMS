<?php

namespace App\Service\Admin\BannerGallery\TopBanner;

use App\Models\HomePageGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data){
        if(isset($data['id'])){
            $dbData = HomePageGallery::all()->pluck('id');
            $delImgs = $dbData->diff($data['id']);
            if(!empty($delImgs) && count($dbData) > count($data['id'])){
                foreach($delImgs as $delImg){
                    HomePageGallery::where('id',$delImg)->delete();
                }
            }
        }else{
            HomePageGallery::truncate();
        }
        if (!empty($data)) {
            if (!empty($data['img'])) {
                foreach ($data['img'] as $i => $img) {
                    $data['img'][$i] = Storage::disk('public')->put('/images', $img);
                }
            }
            for ($i = 0; $i < count($data['url']); $i++) {
                $data['img'][$i] = !isset($data['img'][$i]) ? null : $data['img'][$i];
                $data['url'][$i] = !isset($data['url'][$i]) ? null : $data['url'][$i];
                $data['text'][$i] = !isset($data['text'][$i]) ? null : $data['text'][$i];
                $data['id'][$i] = !isset($data['id'][$i]) ? null : $data['id'][$i];

                if($data['img'][$i] !== null || $data['url'][$i] !== null || $data['text'][$i] !== null){
                    if($data['id'][$i] !== null && $data['img'][$i] === null){
                        HomePageGallery::updateOrCreate(['id'=> $data['id'][$i]],[
                            'url' => $data['url'][$i],
                            'text' => $data['text'][$i],
                        ]);
                    }else{
                        HomePageGallery::updateOrCreate(['id'=> $data['id'][$i]],[
                            'img' => $data['img'][$i],
                            'url' => $data['url'][$i],
                            'text' => $data['text'][$i],
                        ]);
                    }
                }
            }
        }
    }
}
