<?php

namespace App\Service\Admin\News;

use App\Models\News;
use App\Models\NewsGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreate($data){

        $news_id = $data['news_id'] ?? null;
        $data['main_img'] = $data['main_img'] ?? null;
        $main_img_old = $data['main_img_old'] ?? null;
        $data['status'] = $data['status'] ?? 0;
        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['news_id']);
        unset($data['img']);
        unset($data['id']);
        unset($data['main_img_old']);

        if( $data['main_img'] !== null){
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
        }elseif (isset($main_img_old)){
            unset($data['main_img']);
        }
        News::updateOrCreate(['id' => $news_id], $data);

        if($ids !== null){
            $dbData = NewsGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if(!empty($delImgs) && count($dbData) > count($imgs)){
                foreach($delImgs as $delImg){
                    NewsGallery::where('id',$delImg)->delete();
                }
            }
        }

        $news_id = $news_id !== null ? $news_id : News::all()->last()->id;

        if(isset($ids)){
            foreach ($ids as $i => $id)
            {
                $id = $id ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if($imgs['img'][$i] !== null){
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    NewsGallery::updateOrCreate(['news_id' => $news_id, 'id' => $id], ['news_id' => $news_id, 'img' => $imgs['img'][$i]]);
                }
                elseif ($id !== null){
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
    }
}
