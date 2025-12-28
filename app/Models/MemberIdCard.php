<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberIdCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'card_number',
        'card_type',
        'card_status',
        'card_expiration_date',
        'card_allocation_date',
    ];

    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }

    // Card Type Constants
    const CARD_TYPE_NFC = 1;
    const CARD_TYPE_RFID = 2;
    const CARD_TYPE_PLASTIC = 3;
    const CARD_TYPE_OTHER = 4;

    // Card Status Constants
    const CARD_STATUS_INACTIVE = 0;
    const CARD_STATUS_ACTIVE = 1;

    // Get card type name
    public function getCardTypeNameAttribute()
    {
        $types = [
            self::CARD_TYPE_NFC => 'NFC',
            self::CARD_TYPE_RFID => 'RFID',
            self::CARD_TYPE_PLASTIC => 'Plastic',
            self::CARD_TYPE_OTHER => 'Other',
        ];
        return $types[$this->card_type] ?? 'Unknown';
    }

    // Get card status name
    public function getCardStatusNameAttribute()
    {
        return $this->card_status == self::CARD_STATUS_ACTIVE ? 'Active' : 'Inactive';
    }

    // Get all card types
    public static function getCardTypes()
    {
        return [
            self::CARD_TYPE_NFC => 'NFC',
            self::CARD_TYPE_RFID => 'RFID',
            self::CARD_TYPE_PLASTIC => 'Plastic',
            self::CARD_TYPE_OTHER => 'Other',
        ];
    }
}
