<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardHelpCenter extends Component
{
  public $icon;
  public $title;

  public function mount($icon, $title)
  {
    $this->$icon = $icon;
    $this->$title = $title;
  }
  public function render()
  {
    return view('livewire.components.card-help-center');
  }
}
