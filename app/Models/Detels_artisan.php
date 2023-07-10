<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detels_artisan extends Model
{
    use HasFactory;
    protected $fillable = [
        'explain',
        'informationtrip',
        'location',
        'contentourist',
        'Montion_id',
    
    ];
}
