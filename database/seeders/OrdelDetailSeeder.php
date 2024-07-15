<?php

namespace Database\Seeders;

use App\Models\OrderDetails;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdelDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            OrderDetails::create([               
                'order_id' => rand(1, 10),
                'product_id' => rand(1, 10),
                'quantity' => rand(1, 10),
                'price' => rand(1000, 100000),
            ]);
        }
    }
}
