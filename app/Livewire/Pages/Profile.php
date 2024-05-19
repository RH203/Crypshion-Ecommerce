<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profile')]
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.pages.profile');
    }
}
