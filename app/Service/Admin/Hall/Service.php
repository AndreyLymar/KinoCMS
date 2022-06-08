<?php

namespace App\Service\Admin\Hall;

use App\Models\Cinema;
use App\Models\CinemaGallery;
use App\Models\Hall;
use App\Models\HallGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreate($data){
        $hall_id = intval($data['hall_id']) ?? null;

        $data['hall_img'] = $data['hall_img'] ?? null;
        $data['top_banner_img'] = $data['top_banner_img'] ?? null;

        $hall_img_old = $data['hall_img_old'] ?? null;
        $top_banner_img_old = $data['top_banner_img_old'] ?? null;

        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['hall_id']);
        unset($data['img']);
        unset($data['id']);

        unset($data['logo_img_old']);
        unset($data['top_banner_img_old']);

        if( $data['hall_img'] !== null){
            $data['hall_img'] = Storage::disk('public')->put('/images', $data['hall_img']);
        }elseif (isset($hall_img_old)){
            unset($data['hall_img']);
        }
        if( $data['top_banner_img'] !== null){
            $data['top_banner_img'] = Storage::disk('public')->put('/images', $data['top_banner_img']);
        }elseif (isset($top_banner_img_old)){
            unset($data['top_banner_img']);
        }
        Hall::updateOrCreate(['id' => $hall_id], $data);

        if($ids !== null){
            $dbData = HallGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if(!empty($delImgs) && count($dbData) > count($imgs)){
                foreach($delImgs as $delImg){
                    HallGallery::where('id',$delImg)->delete();
                }
            }
        }else{
            HallGallery::truncate();
        }
        $hall_id = $hall_id !== null ? $hall_id : Hall::all()->last()->id;
        if(isset($ids)){
            foreach ($ids as $i => $id)
            {
                $id = intval($id) ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if($imgs['img'][$i] !== null){
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    HallGallery::updateOrCreate(['hall_id' => $hall_id, 'id' => $id], ['hall_id' => $hall_id, 'img' => $imgs['img'][$i]]);
                }
                elseif ($id !== null){
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
        return $data['cinema_id'];
    }

}
