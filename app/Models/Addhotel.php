<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addhotel extends Model
{
   use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'phoenumber',
        'category',
        'image',
        'file_path',
        'file_name',
    
       ];
       public function RoomDetails()
    {
        return $this->hasMany(Detelshotel::class);
    }
   
    public function getImageUrl()
    {
        return $this->image ? Storage::disk()->url($this->image) : null;
    } 
     
}
