<?php

namespace App\Livewire\Pages\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductAdd extends Component
{
    #[Title('Add Product')]
    #[Layout('layouts.app_admin')]

    public function render()
    {
        return view('livewire.pages.app.product-add');
    }
}
