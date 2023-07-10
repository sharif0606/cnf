<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;
    public function video_gallary_category(){
        return $this->belongsTo(VideoGallaryCategory::class);
    }
    public function year(){
        return $this->belongsTo(year::class);
    }
}
