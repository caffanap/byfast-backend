<?php

namespace Database\Seeders;

use App\Models\Topping;
use Illuminate\Database\Seeder;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topping::create([
            'name' => 'Kuota IG',
            'description' => '10GB / 10 hari',
            'type' => 'Instagram',
            'quota' => '10000',
            'price' => '10000',
            'active_period' => '10',
        ]);
    }
}
