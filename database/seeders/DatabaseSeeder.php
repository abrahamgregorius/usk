<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'username' => 'shop',
                'password' => bcrypt('shop'),
                'role' => 'shop',
            ],
            [
                'username' => 'bank',
                'password' => bcrypt('bank'),
                'role' => 'bank',
            ],
            [
                'username' => 'student',
                'password' => bcrypt('student'),
                'role' => 'student',
            ],
        ]);

        Product::insert([
            [
                'name' => "a",
                'price' => 15000,
                'stock' => 150,
                'thumbnail' => "https://source.unsplash.com/1080x1080/",
            ],
            [
                'name' => "b",
                'price' => 25000,
                'stock' => 150,
                'thumbnail' => "https://source.unsplash.com/1080x1080/",
            ],
            [
                'name' => "c",
                'price' => 20000,
                'stock' => 150,
                'thumbnail' => "https://source.unsplash.com/1080x1080/",
            ],
        ]);

        Wallet::insert([
            [
                'user_id' => 4,
                'credit' => 100000,
                'status' => 'success'
            ]
        ]);
    }
}
