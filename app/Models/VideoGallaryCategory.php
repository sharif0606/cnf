<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallaryCategory extends Model
{
    use HasFactory;
    public function year(){
        return $this->belongsTo(year::class);
    }
}
