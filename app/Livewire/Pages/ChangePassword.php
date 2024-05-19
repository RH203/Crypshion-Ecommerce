<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Title('Change Password')]
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.pages.change-password');
    }
}
