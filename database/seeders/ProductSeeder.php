<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $product = [
        [
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
        ],
        [
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
        ],
        [
            'name' => 'Product 3',
            'description' => 'Description for Product 3',
        ],
       ];

        foreach ($product as $product) {
            Product::create($product);
        }
    }
}
