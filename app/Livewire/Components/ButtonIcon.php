<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ButtonIcon extends Component
{
  public $icon;
  public $class;
  public function mount($icon, $class)
  {
    $this->$icon = $icon;
    $this->$class = $class;
  }
  public function render()
  {
    return view('livewire.components.button-icon');
  }
}
