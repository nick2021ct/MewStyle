<?php

namespace Database\Seeders;

use App\Models\Orders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['pending', 'prepare', 'shipping', 'success', 'cancel'];

        for ($i = 0; $i < 10; $i++) {
            Orders::create([               
                'user_id' => rand(1, 10),
                'user_fullname' => Str::random(10),
                'user_email' => Str::random(10).'@gmail.com',
                'user_phone' => Str::random(10),
                'user_address' => Str::random(10),
                'status' => $statuses[array_rand($statuses)],
                'total_money' => rand(1000, 100000),
                'total_quantity' => rand(1, 10),
            ]);
        }
    }
}
