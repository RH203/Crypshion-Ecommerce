<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products')]
#[Layout('layouts.app_admin')]

class Products extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all()->map(function ($product) {
            $product->images = json_decode($product->images, true);
            $product->prices = json_decode($product->prices, true);
            $sizes = array_keys($product->prices);
            $first_price = $product->prices[$sizes[0]];
            $product->first_image = isset($product->images[0]) ? $product->images[0] : null;
            $product->first_price = $first_price;
            return $product;
        });
    }

    public function render()
    {
        return view('livewire.pages.app.products', [
            'products' => $this->products,
        ]);
    }
}
