<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_car',
        'email',
        'user_name',
        'model',
        'price',
        'num_Booking',
        'stayDuration',
        'allpr',
        'name_comp',
    ];
}


