<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detelsTouristPlaces extends Model
{
    use HasFactory;
    protected $fillable = [
        'explain',
        'informationtrip',
        'location',
        'contentourist',
        'tourist_id', 
    
    ];
}
