<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaGallery extends Model
{
    use HasFactory;
    protected $table = 'cinema_galleries';
    protected $guarded = false;

    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }
}
