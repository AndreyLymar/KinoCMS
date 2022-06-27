<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmGallery extends Model
{
    use HasFactory;
    protected $table = 'film_galleries';
    protected $guarded = false;

    public function film(){
        return $this->belongsTo(Film::class);
    }
}
