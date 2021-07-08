<?php

namespace Database\Seeders;

use App\Models\Credit;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credit::create([
            'user_id' => 1,
            'balance' => 100000,
            'point'   => 10000,
        ]);
    }
}
