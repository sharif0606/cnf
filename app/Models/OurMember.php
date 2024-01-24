<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurMember extends Model
{
    use HasApiTokens, Notifiable, HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    * relation with role
    */
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function heirs(){
        return $this->hasMany(heirship::class,'member_id','id');
    }
    public function fee_collection_last(){
        return $this->hasOne(fee_collection::class,'member_id','id')->latest();
    }

    public function fee_amount(){
        return $this->hasMany(fee_collection::class,'member_id','id');
    }
}
