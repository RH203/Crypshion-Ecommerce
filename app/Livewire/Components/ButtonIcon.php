<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ButtonIcon extends Component
{
  public $icon;
  public function mount($icon) {
    $this->$icon = $icon;
  }
    public function render()
    {
        return view('livewire.components.button-icon');
    }
}
