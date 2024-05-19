<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TrackingOrder extends Component
{
    #[Title('Home')]
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.pages.tracking-order');
    }
}
