<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'schedules';

    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function hall(){
        return $this->belongsTo(Hall::class);
    }
}
