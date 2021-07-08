<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              =>  'admin',
            'email'             =>  'admin@mail.com',
            'phone_number'      =>  '089508670107',
            'gender'            =>  true,
            'dob'               =>  '1970-01-01 00:00:00',
            'email_verified_at' =>  now(),
            'password'          =>  Hash::make('123123123'),
        ]);

        User::find(1)->update([
            'name'              =>  'Kukuh Prastyono',
            'email'             =>  'kukuh@gmail.com',
            'phone_number'      =>  '0832154247976',
        ]);
    }
}
