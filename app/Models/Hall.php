<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    protected $table = 'halls';
    protected $guarded = false;

    public function cinema(){
        return $this->belongsTo(Hall::class);
    }
    public function hallGalleries(){
        return $this->hasMany(CinemaGallery::class);
    }
}
