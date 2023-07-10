<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_TouristPlaces',
        'description',
        'address',
        'types',
        'image',
        
    
       ];
       public function poplarDetails()
       {
           return $this->hasMany(Detels_populer::class);
       }
}
