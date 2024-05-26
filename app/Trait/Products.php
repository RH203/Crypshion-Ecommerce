<?php

namespace App\Trait;

use App\Models\app\Product;

trait Products
{
    // Get Products
    public function getProducts($limit = null)
    {
        $query = Product::orderBy('id', 'desc');

        if (is_int($limit)) {
            $query->take($limit);
        }

        return $query->get()->map(function ($product) {
            $product->images = json_decode($product->images, true);
            $product->prices = json_decode($product->prices, true);
            $sizes = array_keys($product->prices);
            $product->first_image = $product->images[0] ?? null;
            $product->first_price = $product->prices[$sizes[0]] ?? null;
            return $product;
        });
    }


    // Show product
    public function showProduct($product, $id)
    {
        $this->destroySession();
        $product = session('product_' . $this->id);

        if ($product) {
            $this->product = $product;
        } else {
            $product = Product::findOrFail($this->id);

            $product->images = json_decode($product->images, true) ?? [];
            $product->prices = json_decode($product->prices, true) ?? [];
            $product->sizes = json_decode($product->sizes, true) ?? [];
            $product->colors = json_decode($product->colors, true) ?? [];

            $product->first_image = $product->images[0] ?? null;

            if (!empty($product->prices)) {
                $prices = array_values($product->prices);
                $product->lowest_price = min($prices);
                $product->highest_price = max($prices);
            } else {
                $product->lowest_price = null;
                $product->highest_price = null;
            }
            session(['product_' . $this->id => $product]);
            $this->product = $product;
        }
    }

    // Destroy session product
    public function destroySession()
    {
        session()->forget('product_' . $this->id);
        session()->forget('showImagePath');
        session()->forget('size');
        session()->forget('color');
        session()->forget('success');
    }
}
