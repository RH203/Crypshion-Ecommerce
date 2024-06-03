<?php

namespace App\Livewire\Pages;

use App\Models\app\Product as AppProduct;
use App\Models\Order;
use App\Models\Rating;
use App\Trait\Products;
use Livewire\Attributes\Url;
use Livewire\Component;

class Product extends Component
{
    use Products;

    public $products;

    #[Url()]
    public $search = '';

    public function mount()
    {
        $this->products = $this->getProducts(null);
    }

    public function searchProduct()
    {
        $filteredProducts = AppProduct::latest()
            ->where('title', 'like', "%{$this->search}%")
            ->get();

        return $filteredProducts;
    }

    public function render()
    {
        $filteredProducts = $this->searchProduct();

        $averageRatings = [];
        $soldQuantities = [];

        foreach ($filteredProducts as $product) {
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');
            $soldQuantities[$product->id] = Order::where('product_id', $product->id)->sum('quantity');
        }

        return view('livewire.pages.product', [
            'products' => $filteredProducts,
            'averageRatings' => $averageRatings,
            'soldQuantities' => $soldQuantities,
        ]);
    }
}
