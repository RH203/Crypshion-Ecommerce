<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Help Center Error Code')]

class HelpCenterErrorCode extends Component
{
  public function render()
  {
    return view('livewire.pages.help-center-error-code');
  }
}
