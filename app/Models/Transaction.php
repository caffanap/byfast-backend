<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packet()
    {
        return $this->belongsTo(Packet::class);
    }

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }

    public function purchasedPacket()
    {
        return $this->hasOne(PurchasedPacket::class);
    }

    public function purchasedTopping()
    {
        return $this->hasOne(PurchasedTopping::class);
    }
}
