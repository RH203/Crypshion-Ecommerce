<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Layout('layouts.app')]
#[Title('Help Center')]

class HelpCenter extends Component
{

  public function render()
  {
    $dataIcon = [
      [
        'icon' => '<iconify-icon icon="hugeicons:truck-delivery"
      class="p-2 text-4xl text-purple-500 rounded-full bg-slate-100 group-hover:bg-gray-200"></iconify-icon>'
      ],
      [
        'icon' => '<iconify-icon icon="material-symbols:payments-outline"
      class="p-2 text-4xl text-purple-500 rounded-full bg-slate-100 group-hover:bg-gray-200"></iconify-icon>'
      ],
      [
        'icon' => '<iconify-icon icon="streamline:code-analysis-solid"
      class="p-2 text-4xl text-purple-500 rounded-full bg-slate-100 group-hover:bg-gray-200"></iconify-icon>'
      ],
      [
        'icon' => '<iconify-icon icon="carbon:chat-bot"
      class="p-2 text-4xl text-purple-500 rounded-full bg-slate-100 group-hover:bg-gray-200"></iconify-icon>'
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
        'title' => 'Error Code'
      ],
      [
        'title' => 'Ask our Assistant Bobi'
      ],
    ];

    $linkHref = [
      [
        'link' => '/help-center/delivery'
      ],
      [
        'link' => '/help-center/payment'
      ],
      [
        'link' => '/help-center/error-code'
      ],
      [
        'link' => '/help-center/ask-bobi'
      ],
    ];

    return view('livewire.pages.help-center', [
      'datas' => $dataIcon,
      'titles' => $dataTitle,
      'links' => $linkHref,
    ]);
  }
}
