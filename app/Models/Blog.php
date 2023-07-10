<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\tag;
use App\Models\BlogCategory;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    public function blog_category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }
    public function tag(){
        return $this->belongsTo(tag::class);
    }
}
