<?php

namespace App\Service\Admin\Cinema;

use App\Models\Cinema;
use App\Models\CinemaGallery;
use App\Models\HallGallery;
use App\Models\SpecialOffer;
use App\Models\SpecialOfferGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreate($data)
    {
        $cinema_id = $data['cinema_id'] ?? null;

        $data['logo_img'] = $data['logo_img'] ?? null;
        $data['top_banner_img'] = $data['top_banner_img'] ?? null;

        $logo_img_old = $data['logo_img_old'] ?? null;
        $top_banner_img_old = $data['top_banner_img_old'] ?? null;

        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['cinema_id']);
        unset($data['img']);
        unset($data['id']);

        unset($data['logo_img_old']);
        unset($data['top_banner_img_old']);

        $logo_img = $cinema_id !== null ? Cinema::find($cinema_id)->logo_img : '';
        $top_banner_img = $cinema_id !== null ? Cinema::find($cinema_id)->top_banner_img : '';


        if ($data['logo_img'] !== null) {
            Storage::disk('public')->delete($logo_img);
            $data['logo_img'] = Storage::disk('public')->put('/images', $data['logo_img']);
        } elseif (isset($logo_img_old)) {
            unset($data['logo_img']);
        } else {
            Storage::disk('public')->delete($logo_img);
        }

        if ($data['top_banner_img'] !== null) {
            Storage::disk('public')->delete($top_banner_img);
            $data['top_banner_img'] = Storage::disk('public')->put('/images', $data['top_banner_img']);
        } elseif (isset($top_banner_img_old)) {
            unset($data['top_banner_img']);
        } else {
            Storage::disk('public')->delete($top_banner_img);
        }

        Cinema::updateOrCreate(['id' => $cinema_id], $data);

        if ($ids !== null) {
            $dbData = CinemaGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if (!empty($delImgs)) {
                foreach ($delImgs as $delImg) {
                    Storage::disk('public')->delete(CinemaGallery::where([['id', $delImg], ['cinema_id', $cinema_id]])->value('img'));
                    CinemaGallery::where([['id', $delImg], ['cinema_id', $cinema_id]])->delete();
                }
            }
        }
        $cinema_id = $cinema_id !== null ? $cinema_id : Cinema::all()->last()->id;
        if (isset($ids)) {
            foreach ($ids as $i => $id) {
                $id = $id ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if ($imgs['img'][$i] !== null) {
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    CinemaGallery::updateOrCreate(['cinema_id' => $cinema_id, 'id' => $id], ['cinema_id' => $cinema_id, 'img' => $imgs['img'][$i]]);
                } elseif ($id !== null) {
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
    }

    public function delete($cinema)
    {
        $cinemaGalleries = CinemaGallery::where('cinema_id', $cinema->id)->get();
        Storage::disk('public')->delete($cinema->logo_img);
        Storage::disk('public')->delete($cinema->top_banner_img);
        foreach ($cinemaGalleries as $cinemaGallery) {
            Storage::disk('public')->delete($cinemaGallery->img);
        }

        foreach ($cinema->halls as $hall){
            $hallGalleries = HallGallery::where('hall_id', $hall->id)->get();
            Storage::disk('public')->delete($hall->hall_img);
            Storage::disk('public')->delete($hall->top_banner_img);
            foreach ($hallGalleries as $hallGallery) {
                Storage::disk('public')->delete($hallGallery->img);
            }
        }


        $cinema->delete();
    }
}
