<?php

namespace App\Livewire\Pages;

use App\Models\app\Product as AppProduct;
use App\Models\Order;
use App\Models\Rating;
use Livewire\Attributes\Url;
use Livewire\Component;

class Product extends Component
{
    public $products;

    #[Url()]
    public $search;

    public function mount()
    {
        // Inisialisasi produk tanpa mempertimbangkan pencarian
        $this->resetSearch();
    }

    public function resetSearch()
    {
        // Mendapatkan semua produk tanpa mempertimbangkan pencarian
        $this->products = AppProduct::orderBy('id', 'desc')
            ->get()
            ->map(function ($product) {
                $product->images = json_decode($product->images, true);
                $product->prices = json_decode($product->prices, true);
                $sizes = array_keys($product->prices);
                $product->first_image = $product->images[0] ?? null;
                $product->first_price = $product->prices[$sizes[0]] ?? null;
                return $product;
            });
    }

    public function searchProduct()
    {
        if ($this->search) {
            // Memfilter produk berdasarkan pencarian yang sesuai
            $this->products = AppProduct::orderBy('id', 'desc')
                ->where('title', 'like', '%' . $this->search . '%')
                ->get()
                ->map(function ($product) {
                    $product->images = json_decode($product->images, true);
                    $product->prices = json_decode($product->prices, true);
                    $sizes = array_keys($product->prices);
                    $product->first_image = $product->images[0] ?? null;
                    $product->first_price = $product->prices[$sizes[0]] ?? null;
                    return $product;
                });
        } else {
            $this->resetSearch();
        }
    }

    public function render()
    {
        $this->searchProduct();

        $averageRatings = [];
        $soldQuantities = [];

        foreach ($this->products as $product) {
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');
            $soldQuantities[$product->id] = Order::where('product_id', $product->id)->sum('quantity');
        }

        return view('livewire.pages.product', [
            'products' => $this->products,
            'averageRatings' => $averageRatings,
            'soldQuantities' => $soldQuantities,
        ]);
    }
}
