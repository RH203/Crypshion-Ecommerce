<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
use App\Models\Order;
use App\Models\Rating;
use App\Trait\Products as TraitProducts;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products')]
#[Layout('layouts.app_admin')]

class Products extends Component
{
    use TraitProducts;
    public $products;

    #[On('product-deleted')] // Listenig event product delete
    public function mount()
    {
        $this->products = $this->getProducts(null);
    }

    public function render()
    {

        $averageRatings = [];
        $soldQuantities = [];

        foreach ($this->products as $product) {
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');
            $soldQuantities[$product->id] = Order::where('product_id', $product->id)->sum('quantity');
        }
        return view('livewire.pages.app.products', [
            'products' => $this->products,
            'averageRatings' => $averageRatings,
            'soldQuantities' => $soldQuantities,
        ]);
    }
}
