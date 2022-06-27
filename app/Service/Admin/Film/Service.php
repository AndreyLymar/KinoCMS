<?php

namespace App\Service\Admin\Film;

use App\Models\Film;
use App\Models\FilmGallery;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function updateOrCreate($data)
    {

        $film_id = $data['film_id'] ?? null;
        $data['main_img'] = $data['main_img'] ?? null;
        $main_img_old = $data['main_img_old'] ?? null;
        $data['type_2d'] = $data['type_2d'] ?? 0;
        $data['type_3d'] = $data['type_3d'] ?? 0;
        $data['type_imax'] = $data['type_imax'] ?? 0;
        $imgs['img'] = $data['img'] ?? null;
        $ids = $data['id'] ?? null;

        unset($data['film_id']);
        unset($data['img']);
        unset($data['id']);
        unset($data['main_img_old']);

//        dd($data);

        $mainImg = $film_id !== null ? Film::find($film_id)->main_img : '';


        if ($data['main_img'] !== null) {
            Storage::disk('public')->delete($mainImg);
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
        } elseif (isset($main_img_old)) {

            unset($data['main_img']);
        }else{
            Storage::disk('public')->delete($mainImg);
        }

        Film::updateOrCreate(['id' => $film_id], $data);

        if ($ids !== null) {
            $dbData = FilmGallery::all()->pluck('id');
            $delImgs = $dbData->diff($ids);
            if (!empty($delImgs)) {
                foreach ($delImgs as $delImg) {
                    Storage::disk('public')->delete(FilmGallery::where([['id', $delImg],['film_id',$film_id]])->value('img'));
                    FilmGallery::where([['id', $delImg],['film_id', $film_id]])->delete();
                }
            }
        }

        $film_id = $film_id !== null ? $film_id : Film::all()->last()->id;

        if (isset($ids)) {
            foreach ($ids as $i => $id) {
                $id = $id ?? null;
                $imgs['img'][$i] = $imgs['img'][$i] ?? null;

                if ($imgs['img'][$i] !== null) {
                    $imgs['img'][$i] = Storage::disk('public')->put('/images', $imgs['img'][$i]);
                    FilmGallery::updateOrCreate(['film_id' => $film_id, 'id' => $id], ['film_id' => $film_id, 'img' => $imgs['img'][$i]]);
                } elseif ($id !== null) {
                    unset($imgs['img'][$i]);
                    unset($id);
                }
            }
        }
    }

    public function delete($film)
    {
        $filmGalleries = FilmGallery::where('film_id', $film->id)->get();
        Storage::disk('public')->delete($film->main_img);
        foreach ($filmGalleries as $filmGallery) {
            Storage::disk('public')->delete($filmGallery->img);
        }
        $film->delete();
    }

}
