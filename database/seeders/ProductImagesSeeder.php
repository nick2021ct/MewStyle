<?php

namespace Database\Seeders;

use App\Models\ProductImages;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            ProductImages::create([               
                'product_id' => rand(1,10),
                'image' => Str::random(10),
            ]);
        }
    }
}
