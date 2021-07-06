<?php

namespace Database\Seeders;

use App\Models\PacketCategory;
use Illuminate\Database\Seeder;

class PacketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PacketCategory::insert([
            ['name' => 'Terpopuler'],
            ['name' => 'Terbaru'],
        ]);
    }
}
