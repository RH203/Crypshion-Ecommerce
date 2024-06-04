<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Help Center Delivery')]

class HelpCenterDelivery extends Component
{
  public function render()
  {
    return view('livewire.pages.help-center-delivery');
  }
}
