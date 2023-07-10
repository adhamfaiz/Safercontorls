<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars_mod extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_car',
        'years',
        'drap',
        'cars_id',
        'contentcomp',
        'catgory',
        'image',
        'Car_Model',
        'MAnfacturing_year',
        'num_doors',
        'Motion_vector',
        'luggage',
        'price_day',
        'imgroomtow',
        'imgroomthree',
        'imgroomfour',
         'contcar',
    
       ];
}

