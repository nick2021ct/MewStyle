<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([               
                'name' => Str::random(10),
                'description' => Str::random(10),
                'price' => rand(1000, 100000),
                'sale_price' => rand(1000, 100000),
                'category_id' => rand(1, 10),

            ]);
        }
    }
}
