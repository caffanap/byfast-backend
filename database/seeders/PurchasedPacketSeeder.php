<?php

namespace Database\Seeders;

use App\Models\PurchasedPacket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PurchasedPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchasedPacket::create([
            'transaction_id' => 1,
            'initial_quota' => 20000,
            'current_quota' => 20000,
            'active_period' => Carbon::now()->addDays(30),
        ]);
    }
}
