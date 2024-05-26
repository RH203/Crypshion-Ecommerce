<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class HelpCenter extends Component
{


  #[Layout('layouts.app')]
  #[Title('Help Center')]

  public function render()
  {
    $dataIcon = [
      [
        'icon' => '<iconify-icon icon="hugeicons:truck-delivery"
      class="text-4xl text-purple-500 group-hover:bg-white group-hover:rounded-full group-hover:border group-hover:p-2 p-2"></iconify-icon>'
      ],
      [
        'icon' => '<iconify-icon icon="streamline:payment-10"
      class="text-4xl text-purple-500 group-hover:bg-white group-hover:rounded-full group-hover:border group-hover:p-2 p-2"></iconify-icon>'
      ],
      [
        'icon' => '<iconify-icon icon="solar:bug-bold"
      class="text-4xl text-purple-500 group-hover:bg-white group-hover:rounded-full group-hover:border group-hover:p-2 p-2"></iconify-icon>'
      ],
      [
        'icon' => '<iconify-icon icon="carbon:chat-bot"
      class="text-4xl text-purple-500 group-hover:bg-white group-hover:rounded-full group-hover:border group-hover:p-2 p-2"></iconify-icon>'
      ],
    ];
    $dataTitle = [
      [
        'title' => 'Delivery'
      ],
      [
        'title' => 'Payment'
      ],
      [
        'title' => 'Bug and Issues'
      ],
      [
        'title' => 'Ask our Assistant Bobi'
      ],
    ];

    return view('livewire.pages.help-center', [
      'datas' => $dataIcon,
      'titles' => $dataTitle
    ]);
  }
}
