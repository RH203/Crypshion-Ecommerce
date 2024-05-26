<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class HelpCenterPayment extends Component
{
  #[Layout('layouts.app')]
  #[Title('Help Center Payment')]
  public function render()
  {
    return view('livewire.pages.help-center-payment');
  }
}
