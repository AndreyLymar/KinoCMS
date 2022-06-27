<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageGallery extends Model
{
    use HasFactory;
    protected $table = 'home_page_galleries';
    protected $guarded = false;
}
