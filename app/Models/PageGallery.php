<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageGallery extends Model
{
    use HasFactory;
    protected $table = 'page_galleries';
    protected $guarded = false;

    public function page(){
       return $this->belongsTo(Page::class);
    }
}
