<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Product extends Component
{
    #[Layout('layouts.app')]
    #[Title('Product')]
    public function render()
    {
        return view('livewire.pages.product');
    }
}



