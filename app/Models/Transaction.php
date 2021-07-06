<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function packets()
    {
        return $this->belongsTo(Packet::class);
    }

    public function toppings()
    {
        return $this->belongsTo(Topping::class);
    }
}