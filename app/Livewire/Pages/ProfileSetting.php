<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProfileSetting extends Component
{
    #[Title('Profile Settings')]
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.pages.profile-setting');
    }
}
