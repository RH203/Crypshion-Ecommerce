<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardHelpCenter extends Component
{
  public $icon;
  public $title;
  public $link;

  public function mount($icon, $title, $link)
  {
    $this->$icon = $icon;
    $this->$title = $title;
    $this->$link = $link;
  }
  public function render()
  {
    return view('livewire.components.card-help-center');
  }
}
