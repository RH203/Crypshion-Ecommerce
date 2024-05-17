<?php

namespace App\Livewire\Pages\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class HelpCenter extends Component
{
    #[Title('Help Center')]
    #[Layout('layouts.app_admin')]

    public function render()
    {
        return view('livewire.pages.app.help-center');
    }
}
