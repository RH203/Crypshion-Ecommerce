<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class HelpCenterBotBobi extends Component
{
  #[Layout('layouts.app')]
  #[Title('Help Center Bot Bobi')]
    public function render()
    {
        return view('livewire.pages.help-center-bot-bobi');
    }
}
