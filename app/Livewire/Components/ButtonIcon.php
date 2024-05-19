<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ButtonIcon extends Component
{
  public $icon;
  public function mount($icon)
  {
    $this->$icon = $icon;
  }
  public function render()
  {
    $dataIcon = [
      ['icon' => '<iconify-icon icon="ic:sharp-home"></iconify-icon>'],
      ['icon' => '<iconify-icon icon="ic:sharp-home"></iconify-icon>'],
      ['icon' => '<iconify-icon icon="ic:sharp-home"></iconify-icon>'],
    ];
    return view('livewire.components.button-icon', [
      'datas' => $dataIcon
    ]);
  }
}
