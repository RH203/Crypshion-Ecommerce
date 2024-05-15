<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardCategory extends Component
{

    public $image;
    public $title;

    public function mount($image, $title)
    {
        $this->image = $image;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.components.card-category');
    }
}
