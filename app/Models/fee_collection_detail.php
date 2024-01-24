<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee_collection_detail extends Model
{
    use HasFactory;
    public function feeCollection()
    {
        return $this->belongsTo(fee_collection::class, 'fee_collections_id');
    }
}
