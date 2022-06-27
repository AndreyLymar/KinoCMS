<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallGallery extends Model
{
    use HasFactory;
    protected $table = 'hall_galleries';
    protected $guarded = false;

    public function hall(){
        return $this->belongsTo(Hall::class);
    }
}
