<?php

namespace App\Service\Admin\Hall;

use App\Models\Cinema;
use App\Models\CinemaGallery;
use App\Models\Hall;
use App\Models\HallGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreate($data)
    {
        $hall_id = $data['hall_id'] ?? null;

        $data['hall_img'] = $data['hall_img'] ?? null;
        $data['top_banner_img'] = $data['top_banner_img'] ?? null;

        $hall_img_old = $data['hall_img_old'] ?? null;
        $top_banner_img_old = $data['top_banner_img_old'] ?? null;

        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['hall_id']);
        unset($data['img']);
        unset($data['id']);

        unset($data['hall_img_old']);
        unset($data['top_banner_img_old']);

        $hall_img = $hall_id !== null ? Hall::find($hall_id)->hall_img : '';
        $top_banner_img = $hall_id !== null ? Hall::find($hall_id)->top_banner_img : '';

        if ($data['hall_img'] !== null) {
            Storage::disk('public')->delete($hall_img);
            $data['hall_img'] = Storage::disk('public')->put('/images', $data['hall_img']);
        } elseif(isset($hall_img_old)) {
            unset($data['hall_img']);
        } else {
            Storage::disk('public')->delete($hall_img);
        }

        if ($data['top_banner_img'] !== null) {
            Storage::disk('public')->delete($top_banner_img);
            $data['top_banner_img'] = Storage::disk('public')->put('/images', $data['top_banner_img']);
        } elseif (isset($top_banner_img_old)) {
            unset($data['top_banner_img']);
        } else {
            Storage::disk('public')->delete($top_banner_img);
        }

        Hall::updateOrCreate(['id' => $hall_id, 'cinema_id' => $data['cinema_id']], $data);

        if ($ids !== null) {
            $dbData = HallGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if (!empty($delImgs)) {
                foreach ($delImgs as $delImg) {
                    Storage::disk('public')->delete(HallGallery::where([['id', $delImg], ['hall_id', $hall_id]])->value('img'));
                    HallGallery::where([['id', $delImg], ['hall_id', $hall_id]])->delete();
                }
            }
        }

        $hall_id = $hall_id !== null ? $hall_id : Hall::all()->last()->id;

        if (isset($ids)) {
            foreach ($ids as $i => $id) {
                $id = $id ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if ($imgs['img'][$i] !== null) {
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    HallGallery::updateOrCreate(['hall_id' => $hall_id, 'id' => $id], ['hall_id' => $hall_id, 'img' => $imgs['img'][$i]]);
                } elseif ($id !== null) {
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
        return $data['cinema_id'];
    }

    public function delete($hall)
    {
        $hallGalleries = HallGallery::where('hall_id', $hall->id)->get();
        Storage::disk('public')->delete($hall->hall_img);
        Storage::disk('public')->delete($hall->top_banner_img);
        foreach ($hallGalleries as $hallGallery) {
            Storage::disk('public')->delete($hallGallery->img);
        }
        $hall->delete();
    }
}
