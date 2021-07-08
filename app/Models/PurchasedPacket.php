<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchasedPacket extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $date = ['active_period'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
