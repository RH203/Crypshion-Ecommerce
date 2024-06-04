<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
use App\Models\Order;
use App\Models\Rating;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Category')]
#[Layout('layouts.app')]

class Category extends Component
{
    public $categoryData;
    // public $products;


    public function mount($id)
    {
        $this->categoryData = Product::orderBy('id', 'desc')->where('category_id', $id)
            ->get()
            ->map(function ($product) {
                $product->images = json_decode($product->images, true);
                $product->prices = json_decode($product->prices, true);
                $sizes = array_keys($product->prices);
                $product->first_image = $product->images[0] ?? null;
                $product->first_price = $product->prices[$sizes[0]] ?? null;
                return $product;
            });
        // $this->categoryData = Product::where('category_id', $id)->get();
    }

    public function render()
    {
        $averageRatings = [];
        $soldQuantities = [];

        foreach ($this->categoryData as $product) {
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');
            $soldQuantities[$product->id] = Order::where('product_id', $product->id)->sum('quantity');
        }

        return view('livewire.pages.category', [
            'categoryData' => $this->categoryData,
            // 'products' => $this->products,
            'averageRatings' => $averageRatings,
            'soldQuantities' => $soldQuantities,
        ]);
    }
}
