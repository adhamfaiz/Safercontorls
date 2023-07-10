<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detels_populer extends Model
{
    use HasFactory;
    protected $fillable = [
        'explain',
        'informationtrip',
        'location',
        'contentourist', 
        'populars_id',
          ];
          public function ditpoplr()
       {
           return $this->belongsTo(Popular::class);
       }
}
