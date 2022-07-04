<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $table = 'seats';
    protected $guarded = false;

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
