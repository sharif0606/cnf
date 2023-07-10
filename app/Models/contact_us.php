<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contact_us extends Model
{
    use HasFactory,SoftDeletes;
    public function contact_reason(){
        return $this->belongsTo(contact_reason::class);
    }
}
