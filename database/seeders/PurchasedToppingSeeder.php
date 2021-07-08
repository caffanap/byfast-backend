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
            'user_id' => 1,
            'transaction_id' => 1,
            'type' => 'Instagram',
            'initial_quota' => 10000,
            'current_quota' => 10000,
            'active_period' => Carbon::now()->addDays(10),
        ]);
    }
}
