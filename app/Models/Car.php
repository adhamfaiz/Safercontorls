<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_company',
        'description',
        'address',
        'phoenumber',
        'email',
        'image',
    
       ];
       public function hotelDetails()
       {
           return $this->hasMany(Cars_mod::class);
       }
}
