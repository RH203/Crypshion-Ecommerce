<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About')]
#[Layout('layouts.app')]

class About extends Component
{


    public function render()
    {
        return view('livewire.pages.about');
    }
}
