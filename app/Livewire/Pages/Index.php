<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
use App\Trait\Products;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
#[Layout('layouts.app')]

class Index extends Component
{
    use Products;
    public $products;

    public function mount()
    {
        $this->products = $this->getProducts(5);
    }


    public function render()
    {
        return view('livewire.pages.index', [
            'products' => $this->products
        ]);
    }
}
