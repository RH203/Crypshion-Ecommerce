<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class HelpCenterErrorCode extends Component
{
  #[Layout('layouts.app')]
  #[Title('Help Center Error Code')]
    public function render()
    {
        return view('livewire.pages.help-center-error-code');
    }
}
