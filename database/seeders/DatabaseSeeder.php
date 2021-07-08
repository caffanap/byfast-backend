<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\Topping;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            PacketCategorySeeder::class,
            PacketSeeder::class,
            ToppingSeeder::class,
            TransactionSeeder::class,
            PurchasedPacketSeeder::class,
            PurchasedToppingSeeder::class,
            CreditSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
