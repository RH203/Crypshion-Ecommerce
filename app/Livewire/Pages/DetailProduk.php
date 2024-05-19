<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailProduk extends Component
{
    #[Layout('layouts.app')]
    #[Title('Detail Produk')]

    

    public function render()
    {
        return view('livewire.pages.detail-produk');
    }
}
