<?php

namespace Database\Seeders;

use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $product = new Product(['name' => 'Product #1',
                                'detail' => 'Product #1 details']);
        $product->save();
        $product = new Product(['name' => 'Product #2',
                                'detail' => 'Product #2 details']);
        $product->save();
    }
}
