<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
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
        return view('livewire.pages.app.products', [
            'products' => $this->products,
        ]);
    }
}
