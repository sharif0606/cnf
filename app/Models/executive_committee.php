<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class executive_committee extends Model
{
    use HasFactory,SoftDeletes;

    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }
    public function session(){
        return $this->belongsTo(committee_session::class,'committee_sessions_id','id');
    }
}
