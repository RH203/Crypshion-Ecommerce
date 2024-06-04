<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardCategory extends Component
{

    public $image;
    public $title;
    public $url;

    public function mount($image, $title, $url = '#')
    {
        $this->image = $image;
        $this->title = $title;
        $this->url = $url;
    }

    public function render()
    {
        return view('livewire.components.card-category');
    }
}
