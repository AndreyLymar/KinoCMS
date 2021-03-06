<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    use HasFactory;
    protected $table = 'news_galleries';
    protected $guarded = false;
    public function news(){
        return $this->belongsTo(News::class);
    }
}
