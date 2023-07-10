<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class founding_committee extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','membership_no');
    }
}
