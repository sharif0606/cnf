<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_due extends Model
{
    use HasFactory;
    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }
}
