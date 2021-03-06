<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOfferGallery extends Model
{
    use HasFactory;
    protected $table = 'special_offer_galleries';
    protected $guarded = false;

    public function specialOffer()
    {
        return $this->belongsTo(SpecialOffer::class);
    }
}
