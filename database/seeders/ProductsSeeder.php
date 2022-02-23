<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::where('id','>',0)->delete();

        $SR1 = new Product();
        $SR1->product_code = Product::SR1_TYPE;
        $SR1->name = 'Strawberry';
        $SR1->price = 5.0;
        $SR1->save();

        $FR1 = new Product();
        $FR1->product_code = Product::FR1_TYPE;
        $FR1->name = 'Fruit Tea';
        $FR1->price = 3.11;
        $FR1->save();

        $CF1 = new Product();
        $CF1->product_code = Product::CF1_TYPE;
        $CF1->name = 'Coffee';
        $CF1->price = 11.23;
        $CF1->save();
    }
}
