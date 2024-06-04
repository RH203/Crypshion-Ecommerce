<?php

namespace App\Livewire\Pages\App;

use App\Models\Subscribe as ModelsSubscribe;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products')]
#[Layout('layouts.app_admin')]

class Subscribe extends Component
{
    public function render()
    {
        return view('livewire.pages.app.subscribe', [
            'data' => ModelsSubscribe::orderBy('id', 'DESC')->get()
        ]);
    }
}
