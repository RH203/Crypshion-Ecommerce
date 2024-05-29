<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class HelpCenterDelivery extends Component
{
  #[Layout('layouts.app')]
  #[Title('Help Center Delivery')]
    public function render()
    {
        return view('livewire.pages.help-center-delivery');
    }
}
