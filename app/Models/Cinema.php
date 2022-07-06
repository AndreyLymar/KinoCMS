<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $table = 'cinemas';
    protected $guarded = false;

    public function halls(){
        return $this->hasMany(Hall::class);
    }
    public function cinemaGalleries(){
        return $this->hasMany(CinemaGallery::class);
    }

    public function contact_page(){
        return $this->belongsTo(ContactPage::class);
    }
}
