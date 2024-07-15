<?php

namespace Database\Seeders;

use App\Models\Reviews;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Reviews::create([               
                'user_id' => rand(1, 5),
                'product_id' => rand(1, 10),
                'rating' => rand(1, 5),
                'comment' => Str::random(10),
            ]);
        }
    }
}
