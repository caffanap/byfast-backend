<?php

namespace Database\Seeders;

use App\Models\PurchasedTopping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PurchasedToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchasedTopping::create([
            'transaction_id' => 1,
            'initial_quota' => 10000,
            'current_quota' => 10000,
            'active_period' => Carbon::now()->addDays(10),
        ]);
    }
}
