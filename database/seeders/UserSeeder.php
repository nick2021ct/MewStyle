<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => '0' . rand(100000000, 999999999),
                'address' => Str::random(10),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
