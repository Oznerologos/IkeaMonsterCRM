<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(25)
            ->create();

        Product::factory()
            ->count(25)
            ->create();

        Cart::factory()
            ->count(25)
            ->create();

        Promotion::factory()
            ->count(25)
            ->create();

        for ($i = 0; $i < 25; $i++) {
            $product = Product::inRandomOrder()->first();
            $cart = Cart::inRandomOrder()->first();
            $product->carts()->attach($cart->id);
            $product->save();
        }
    }
}
