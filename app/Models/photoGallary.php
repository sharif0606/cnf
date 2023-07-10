<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photoGallary extends Model
{
    use HasFactory;
    public function photo_gallary_category(){
        return $this->belongsTo(photoGallaryCategory::class);
    }
    public function year(){
        return $this->belongsTo(year::class);
    }
    
}
