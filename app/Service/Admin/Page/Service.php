<?php

namespace App\Service\Admin\Page;

use App\Models\HomePage;
use App\Models\Page;
use App\Models\PageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function storeMain($data){
        HomePage::firstOrCreate($data);
    }
    public function updateMain( HomePage $home, $data){
        $home->update($data);
    }

    public function updateOrCreatePages($data){
        $page_id = intval($data['page_id']) ?? null;
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
                    PageGallery::where('id',$delImg)->delete();
                }
            }
        }else{
            PageGallery::truncate();
        }
        $page_id = $page_id !== null ? $page_id : Page::all()->last()->id;
        if(isset($ids)){
            foreach ($ids as $i => $id)
            {
                $id = intval($id) ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if($imgs['img'][$i] !== null){
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    PageGallery::updateOrCreate(['page_id' => $page_id, 'id' => $id], ['page_id' => $page_id, 'img' => $imgs['img'][$i]]);
                }
                elseif ($id !== null){
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
    }
}
