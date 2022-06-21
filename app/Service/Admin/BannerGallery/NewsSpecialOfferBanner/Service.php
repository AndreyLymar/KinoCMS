<?php

namespace App\Service\Admin\BannerGallery\NewsSpecialOfferBanner;

use App\Models\HomePageGallery;
use App\Models\NewsSpecialOfferGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data){
        if(isset($data['id'])){
            $dbData = NewsSpecialOfferGallery::all()->pluck('id');
            $delImgs = $dbData->diff($data['id']);
            if(!empty($delImgs) && count($dbData) > count($data['id'])){
                foreach($delImgs as $delImg){
                    Storage::disk('public')->delete(NewsSpecialOfferGallery::find($delImg)->img);
                    NewsSpecialOfferGallery::where('id',$delImg)->delete();
                }
            }
        }else{
            $newsSpecialOfferGallery = NewsSpecialOfferGallery::all();
            foreach ($newsSpecialOfferGallery as $img) {
                Storage::disk('public')->delete($img->img);
                $img->delete();
            }
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
                $data['id'][$i] = !isset($data['id'][$i]) ? null : $data['id'][$i];

                if($data['img'][$i] !== null || $data['url'][$i] !== null){
                    if($data['id'][$i] !== null && $data['img'][$i] === null){
                        NewsSpecialOfferGallery::updateOrCreate(['id'=> $data['id'][$i]],[
                            'url' => $data['url'][$i],
                        ]);
                    }else{
                        NewsSpecialOfferGallery::updateOrCreate(['id'=> $data['id'][$i]],[
                            'img' => $data['img'][$i],
                            'url' => $data['url'][$i],
                        ]);
                    }
                }
            }
        }
    }
}
