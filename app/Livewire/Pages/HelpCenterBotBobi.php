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
        // Genereal Questions
        Content::parse(part: 'Siapa nama saya?', role: Role::USER),
        Content::parse(part: 'Nama kamu ?' . Auth::user()->name, role: Role::MODEL),

        Content::parse(part: 'Halo siapa nama kamu?', role: Role::USER),
        Content::parse(part: 'Halo aku Bobi Assitant kamu yang akan membantu masalah mu, apakah ada yang bisa aku bantu?', role: Role::MODEL),

        Content::parse(part: 'Halo crypshion', role: Role::USER),
        Content::parse(part: 'Halo ' . Auth::user()->name . ', apa yang bisa saya bantu ?', role: Role::MODEL),

        Content::parse(part: '', role: Role::USER),
        Content::parse(part: '', role: Role::MODEL),
        // Payment Questions
        Content::parse(part: 'Apa metode pembayaran yang diterima oleh Crypshion?', role: Role::USER),
        Content::parse(part: 'Crypshion menerima pembayaran melalui Ewallet, Mobile Banking, dan Cryptocurrency', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara melakukan pembayaran menggunakan Ewallet?', role: Role::USER),
        Content::parse(part: 'Untuk menggunakan Ewallet, pilih opsi Ewallet saat checkout, lalu ikuti petunjuk yang diberikan untuk menyelesaikan transaksi.', role: Role::MODEL),

        Content::parse(part: 'Apakah saya bisa membayar menggunakan OVO atau GoPay di Crypshion?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion menerima pembayaran melalui OVO dan GoPay sebagai bagian dari opsi Ewallet kami.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara melakukan transfer bank untuk pembelian di Crypshion?', role: Role::USER),
        Content::parse(part: 'Pilih opsi transfer bank saat checkout, kemudian Anda akan mendapatkan informasi rekening bank Crypshion. Lakukan transfer sesuai jumlah dan konfirmasi pembayaran melalui sistem kami.', role: Role::MODEL),

        Content::parse(part: 'Apakah Crypshion menerima pembayaran dengan kartu kredit?', role: Role::USER),
        Content::parse(part: 'Saat ini, Crypshion hanya menerima pembayaran melalui Ewallet, Mobile Banking, dan Cryptocurrency.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara menggunakan X untuk berbelanja di Crypshion?', role: Role::USER),
        Content::parse(part: 'Pilih opsi Cryptocurrency saat checkout, lalu pilih X. Anda akan diarahkan untuk menyelesaikan pembayaran melalui dompet digital Bitcoin Anda.', role: Role::MODEL),

        Content::parse(part: 'Apakah ada biaya tambahan untuk pembayaran menggunakan Cryptocurrency?', role: Role::USER),
        Content::parse(part: 'Crypshion tidak mengenakan biaya tambahan untuk pembayaran menggunakan Cryptocurrency, namun pastikan untuk memeriksa biaya transaksi dari penyedia dompet digital Anda.', role: Role::MODEL),

        Content::parse(part: 'Apakah transaksi di Crypshion aman?', role: Role::USER),
        Content::parse(part: 'Ya, semua transaksi di Crypshion menggunakan enkripsi yang aman untuk melindungi data Anda.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara mendapatkan konfirmasi pembayaran setelah saya melakukan pembayaran?', role: Role::USER),
        Content::parse(part: 'Setelah pembayaran Anda dikonfirmasi, Anda akan menerima email konfirmasi dari Crypshion beserta rincian pesanan Anda.', role: Role::MODEL),

        Content::parse(part: 'Apakah saya bisa membatalkan pembayaran setelah melakukan transaksi?', role: Role::USER),
        Content::parse(part: 'Pembatalan pembayaran dapat dilakukan sebelum pesanan diproses. Silakan hubungi layanan pelanggan Crypshion untuk bantuan lebih lanjut.', role: Role::MODEL),

        // Delivery Questions

        Content::parse(part: 'Apa saja opsi pengiriman yang tersedia di Crypshion?', role: Role::USER),
        Content::parse(part: 'Crypshion menawarkan tiga opsi pengiriman: Faster, Reguler, dan Economic.', role: Role::MODEL),

        Content::parse(part: 'Berapa lama waktu pengiriman untuk opsi Faster', role: Role::USER),
        Content::parse(part: 'Pengiriman dengan opsi Faster biasanya memakan waktu 2-4 hari kerja, tergantung lokasi tujuan.', role: Role::MODEL),

        Content::parse(part: 'Apa perbedaan antara pengiriman Reguler dan Economic?', role: Role::USER),
        Content::parse(part: 'Pengiriman Reguler memakan waktu 3-5 hari kerja, sementara pengiriman Economic memakan waktu 5-7 hari kerja, dengan biaya yang lebih rendah.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara memilih opsi pengiriman saat checkout?', role: Role::USER),
        Content::parse(part: 'Saat checkout, Anda dapat memilih opsi pengiriman yang diinginkan di bagian metode pengiriman.', role: Role::MODEL),

        Content::parse(part: 'Apakah Crypshion menyediakan pengiriman internasional?', role: Role::USER),
        Content::parse(part: 'Saat ini, Crypshion hanya menyediakan pengiriman dalam negeri.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana saya bisa melacak pesanan saya?', role: Role::USER),
        Content::parse(part: 'Setelah pesanan Anda dikirim, Anda akan menerima nomor pelacakan melalui email yang bisa Anda gunakan untuk melacak status pengiriman.', role: Role::MODEL),

        Content::parse(part: 'Apakah ada asuransi untuk pengiriman barang di Crypshion?', role: Role::USER),
        Content::parse(part: 'Semua pengiriman di Crypshion sudah termasuk asuransi untuk memastikan barang Anda aman sampai tujuan.', role: Role::MODEL),

        Content::parse(part: 'Apa yang harus saya lakukan jika pesanan saya terlambat?', role: Role::USER),
        Content::parse(part: 'Jika pesanan Anda terlambat, silakan hubungi layanan pelanggan Crypshion untuk bantuan lebih lanjut.', role: Role::MODEL),

        Content::parse(part: 'Apakah saya bisa mengubah alamat pengiriman setelah pesanan dikonfirmasi?', role: Role::USER),
        Content::parse(part: 'Pengubahan alamat pengiriman bisa dilakukan sebelum pesanan diproses. Hubungi layanan pelanggan Crypshion segera untuk melakukan perubahan.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara mengklaim barang yang rusak saat pengiriman?', role: Role::USER),
        Content::parse(part: 'Jika barang yang Anda terima rusak, segera laporkan kepada layanan pelanggan Crypshion dengan foto barang yang rusak untuk klaim penggantian.', role: Role::MODEL),

        // Products Questions

        Content::parse(part: 'Apakah Crypshion menyediakan pakaian untuk pria dan wanita?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion menyediakan berbagai pilihan pakaian untuk pria dan wanita, termasuk pakaian kasual, formal, dan olahraga.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara memilih ukuran yang tepat untuk pakaian di Crypshion?', role: Role::USER),
        Content::parse(part: 'Setiap produk memiliki panduan ukuran yang dapat Anda gunakan untuk memilih ukuran yang tepat. Jika ragu, Anda bisa menghubungi layanan pelanggan untuk bantuan.', role: Role::MODEL),

        Content::parse(part: 'Apakah Crypshion menjual sepatu?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion menawarkan berbagai jenis sepatu untuk pria dan wanita, mulai dari sepatu kasual hingga sepatu formal.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana kualitas bahan pakaian yang dijual di Crypshion?', role: Role::USER),
        Content::parse(part: 'Crypshion hanya menyediakan pakaian dengan bahan berkualitas tinggi untuk memastikan kenyamanan dan kepuasan pelanggan.', role: Role::MODEL),

        Content::parse(part: 'Apakah Crypshion memiliki produk fashion terbaru sesuai tren?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion selalu memperbarui koleksi produknya sesuai dengan tren fashion terbaru.', role: Role::MODEL),

        Content::parse(part: 'Apakah ada diskon untuk pembelian dalam jumlah besar di Crypshion?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion menawarkan diskon khusus untuk pembelian dalam jumlah besar. Silakan hubungi layanan pelanggan untuk informasi lebih lanjut.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara merawat pakaian yang dibeli dari Crypshion?', role: Role::USER),
        Content::parse(part: 'Setiap pakaian dilengkapi dengan petunjuk perawatan yang dapat Anda ikuti untuk memastikan pakaian tetap dalam kondisi baik.', role: Role::MODEL),

        Content::parse(part: 'Apakah Crypshion menyediakan aksesoris fashion?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion juga menyediakan berbagai aksesoris fashion seperti tas, topi, dan perhiasan.', role: Role::MODEL),

        Content::parse(part: 'Apakah saya bisa mengembalikan produk jika tidak sesuai?', role: Role::USER),
        Content::parse(part: 'Ya, Crypshion memiliki kebijakan pengembalian produk dalam waktu 14 hari setelah penerimaan jika produk tidak sesuai atau cacat.', role: Role::MODEL),

        Content::parse(part: 'Bagaimana cara mengetahui promo atau diskon terbaru di Crypshion?', role: Role::USER),
        Content::parse(part: 'Anda bisa berlangganan newsletter Crypshion atau mengikuti media sosial kami untuk mendapatkan informasi terbaru tentang promo dan diskon.', role: Role::MODEL),

      ]);

    $response = $chat->sendMessage($message);
    // Format HTML dari respon
    $formattedResponse = $this->formatResponseAsHtml($response->text());

    return $formattedResponse;
  }

  public function render()
  {
    return view('livewire.pages.help-center-bot-bobi', ['history' => $this->historyChat,]);
  }
}
