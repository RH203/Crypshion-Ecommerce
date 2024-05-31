<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Content;
use Gemini\Enums\Role;
use Illuminate\Support\Facades\Auth;

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

  private function formatResponseAsHtml($responseText)
  {
    // Mengganti pola **teks** dengan <strong>teks</strong>
    $responseText = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $responseText);

    // Mengganti baris baru dengan paragraf HTML
    $paragraphs = explode("\n", $responseText);
    $html = "<div>";

    foreach ($paragraphs as $paragraph) {
      $html .= "<p>" . $paragraph . "</p>";
    }

    $html .= "</div>";

    return $html;
  }

  public function modelGeminiChatBot($message)
  {
    $chat = Gemini::chat()
      ->startChat(history: [
        Content::parse(part: 'siapa nama saya?', role: Role::USER),
        Content::parse(part: 'Nama kamu ?'  . Auth::user()->name, role: Role::MODEL),
        Content::parse(part: 'Halo siapa nama kamu?', role: Role::USER),
        Content::parse(part: 'Halo aku Crypshion Assitant yang akan membantu masalah mu, apakah ada yang bisa aku bantu?', role: Role::MODEL),
        Content::parse(part: 'Pembayaran apa saja yang didukung oleh Crypshion ?', role: Role::USER),
        Content::parse(part: 'Halo crypshion', role: Role::USER),
        Content::parse(part: 'Halo ' . Auth::user()->name . ', apa yang bisa saya bantu ?', role: Role::MODEL),
        Content::parse(part: 'Saat ini, Crypshion mendukung metode pembayaran dengan Ewallet, Mobile Banking, dan Cryptocurrency. Kami terus berupaya menambahkan lebih banyak metode pembayaran untuk kenyamanan pengguna kami.', role: Role::MODEL),
      ]);

    $response = $chat->sendMessage($message);
    // Format HTML dari respon
    $formattedResponse = $this->formatResponseAsHtml($response->text());

    return $formattedResponse;
  }

  public function render()
  {
    return view('livewire.pages.help-center-bot-bobi', ['history' => $this->historyChat]);
  }
}
