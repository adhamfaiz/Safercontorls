<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_hotel extends Model
{
    use HasFactory;
    protected $fillable = [
    'username',
    'email',
    'phone',
    'roomNumber',
    'num_Booking',
    'pricePerNight',
    'stayDuration',
    'allpr',
];
}
