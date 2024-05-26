<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $cartCount;
    #[On('cart_count')]
    public function mount()
    {
        // Set initial cart count from session
        $this->cartCount = session('cart_count', 0);
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
