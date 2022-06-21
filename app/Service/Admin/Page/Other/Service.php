<?php

namespace App\Service\Admin\Page\Other;

use App\Models\Page;
use App\Models\PageGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreatePages($data){
        $page_id = $data['page_id'] ?? null;
        $data['main_img'] = $data['main_img'] ?? null;
        $main_img_old = $data['main_img_old'] ?? null;
        $data['status'] = $data['status'] ?? 0;
        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['page_id']);
        unset($data['img']);
        unset($data['id']);
        unset($data['main_img_old']);

        if( $data['main_img'] !== null){
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
        }elseif (isset($main_img_old)){
            unset($data['main_img']);
        }
        Page::updateOrCreate(['id' => $page_id], $data);

        if($ids !== null){
            $dbData = PageGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if(!empty($delImgs) && count($dbData) > count($imgs)){
                foreach($delImgs as $delImg){
                    PageGallery::where([['id',$delImg],['page_id',$page_id]])->delete();
                }
            }
        }
        $page_id = $page_id !== null ? $page_id : Page::all()->last()->id;

        if(isset($ids)){
            foreach ($ids as $i => $id)
            {
                $id = $id ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if($imgs['img'][$i] !== null){
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    PageGallery::updateOrCreate(['page_id' => $page_id, 'id' => $id], ['page_id' => $page_id, 'img' => $imgs['img'][$i]]);
                }
                elseif ($id !== null || $id == 0){
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
    }
}
