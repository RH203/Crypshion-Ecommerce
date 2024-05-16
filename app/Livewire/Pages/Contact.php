<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Layout('layouts.app')]
    #[Title('Contact')]
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
