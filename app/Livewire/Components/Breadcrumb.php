<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $page;

    public function mount($page = 'Title')
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.components.breadcrumb');
    }
}
