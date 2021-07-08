<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'title' => 'Diskon Akhir Bulan',
            'description' => 'Dapatkan 50% untuk periode 29-31 Februari 2021',
            'image' => '/random.jpeg',
        ]);
    }
}
