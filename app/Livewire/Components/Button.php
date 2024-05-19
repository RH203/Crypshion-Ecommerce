<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
  public $title;
  public $class;

  public function mount($title = 'Test Button', $class = 'bg-red-300')
  {
    $this->title = $title;
    $this->class = $class;
  }




  public function render()
  {
    return view('livewire.components.button');
  }
}
