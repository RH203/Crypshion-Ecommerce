<?php

namespace App\Livewire\Pages\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Category extends Component
{
    #[Title('Category')]
    #[Layout('layouts.app_admin')]

    public function render()
    {
        return view('livewire.pages.app.category');
    }
}
