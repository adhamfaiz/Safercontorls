<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detelshotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'numRoom',
        'floor',
        'numofroom',
        'typeroom',
        'numFmaily',
        'price',
        'catgory',
        'imgroomone',
        'imgroomtow',
        'imgroomthree',
        'imgroomfour',
        'contentHotel',
        'rooms_id', 
       ];
       public function hotel()
       {
           return $this->belongsTo(Addhotel::class);
       }
      
      
}
