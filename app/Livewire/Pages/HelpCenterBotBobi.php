<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Content;
use Gemini\Enums\Role;

class HelpCenterBotBobi extends Component
{
  #[Layout('layouts.app')]
  #[Title('Help Center Bot Bobi')]

  public $question = '';
  public $historyChat = [];

  public function submit()
  {
    // Add user question to history
    $this->historyChat[] = ['type' => 'user', 'message' => $this->question];

    // Get response from chatbot
    $response = $this->modelGeminiChatBot($this->question);

    // Add bot response to history
    $this->historyChat[] = ['type' => 'bot', 'message' => $response];

    // Clear the question input
    $this->question = '';
  }

  public function modelGeminiChatBot($message)
  {
    $chat = Gemini::chat()
      ->startChat(history: [
        Content::parse(part: 'Halo siapa dengan siapa aku berbicara?', role: Role::USER),
        Content::parse(part: 'Halo aku Crypshion Assitant yang akan membantu masalah mu, apakah ada yang bisa aku bantu?', role: Role::MODEL),
        Content::parse(part: 'Pembayaran apa saja yang didukung oleh Crypshion ?', role: Role::USER),
        Content::parse(part: 'Saat ini, Crypshion mendukung metode pembayaran dengan Ewallet, Mobile Banking, dan Cryptocurrency. Kami terus berupaya menambahkan lebih banyak metode pembayaran untuk kenyamanan pengguna kami.', role: Role::MODEL),
      ]);

    $response = $chat->sendMessage($message);
    return $response->text();
  }

  public function render()
  {
    return view('livewire.pages.help-center-bot-bobi', ['history' => $this->historyChat]);
  }
}
