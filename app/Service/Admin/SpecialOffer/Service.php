<?php

namespace App\Service\Admin\SpecialOffer;

use App\Models\HomePage;
use App\Models\Page;
use App\Models\PageGallery;
use App\Models\SpecialOffer;
use App\Models\SpecialOfferGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreate($data){
//dd($data);
        $special_offer_id = $data['special_offer_id'] ?? null;
        $data['main_img'] = $data['main_img'] ?? null;
        $main_img_old = $data['main_img_old'] ?? null;
        $data['status'] = $data['status'] ?? 0;
        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['special_offer_id']);
        unset($data['img']);
        unset($data['id']);
        unset($data['main_img_old']);

        if( $data['main_img'] !== null){
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
        }elseif (isset($main_img_old)){
            unset($data['main_img']);
        }
        SpecialOffer::updateOrCreate(['id' => $special_offer_id], $data);

        if($ids !== null){
            $dbData = SpecialOfferGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if(!empty($delImgs) && count($dbData) > count($imgs)){
                foreach($delImgs as $delImg){
                    SpecialOfferGallery::where('id',$delImg)->delete();
                }
            }
        }

        $special_offer_id = $special_offer_id !== null ? $special_offer_id : SpecialOffer::all()->last()->id;

        if(isset($ids)){
            foreach ($ids as $i => $id)
            {
                $id = $id ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if($imgs['img'][$i] !== null){
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    SpecialOfferGallery::updateOrCreate(['special_offer_id' => $special_offer_id, 'id' => $id], ['special_offer_id' => $special_offer_id, 'img' => $imgs['img'][$i]]);
                }
                elseif ($id !== null){
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
    }
}
