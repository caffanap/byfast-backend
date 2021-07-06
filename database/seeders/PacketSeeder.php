<?php

namespace Database\Seeders;

use App\Models\Packet;
use Illuminate\Database\Seeder;

class PacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packet::create([
            'packet_category_id' => 1,
            'name' => 'Paket Internet Lokal Extra',
            'description' => '20GB / 30 hari',
            'quota' => '20000',
            'price' => '50000',
            'point_reward' => '50',
            'active_period' => '30',
        ]);
    }
}
