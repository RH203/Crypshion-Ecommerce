<?php

namespace App\Livewire\Pages;

use App\Models\app\Product as AppProduct;
use App\Trait\Products;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.app')]
#[Title('Product')]


class Product extends Component
{
    use Products;

    public $products;
    public $search;

    public function mount()
    {
        $this->products = $this->getProducts(null);
    }

    public function render()
    {
        AppProduct::orderBy('id', 'DESC')
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->get();

        return view('livewire.pages.product', [
            'products' => $this->products
        ]);
    }
}
