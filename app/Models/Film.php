<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $guarded = false;

    public function filmGalleries(){
        return $this->hasMany(FilmGallery::class);
    }

    public function halls(){
        return $this->hasMany(Hall::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
