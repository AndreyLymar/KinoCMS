<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    use HasFactory;
    protected $table = 'special_offers';
    protected $guarded = false;

    public function specialOfferGalleries()
    {
        return $this->hasMany(SpecialOfferGallery::class);
    }
}
