<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class HelpCenter extends Component
{
  #[Layout('layouts.app')]
  #[Title('Help Center')]
  public function render()
  {
    return view('livewire.pages.help-center');
  }
}
