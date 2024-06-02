<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Cart as ModelsCart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Cart')]

class Cart extends Component
{
  use LivewireAlert;

  public $datas;
  public $selectPayment = 'online';
  public $provinceId;
  public $regencyId;
  public $districtId;
  public $villageId;
  public $zipCode;
  public $totalQty = 0;
  public $tax = 1000;
  public $subTotalProducts = 0;
  public $total = 0;
  public $snapToken = null;
  public $codeTrx;
  public $dataDelivery = [];
  public $selectedDelivery;

  protected $listeners = ['Checkout' => 'checkout', 'paymentSuccess', 'paymentCancel'];

  public function mount()
  {
    $this->provinceId = Province::find(Auth::user()->province_id);
    $this->regencyId = Regency::find(Auth::user()->regency_id);
    $this->districtId = District::find(Auth::user()->district_id);
    $this->villageId = Village::find(Auth::user()->village_id);
    $this->zipCode = User::find(Auth::user()->id);
  }

  public function connectWallet()
  {
    $this->dispatch('connect-wallet-event');
  }

  public function selectDelivery()
  {
    $this->dataDelivery = [];

    switch ($this->selectedDelivery) {
      case 'faster':
        $this->dataDelivery = [
          'name' => 'Faster',
          'estimation' => '2 - 4 day',
          'cost' => 35000
        ];
        break;
      case 'reguler':
        $this->dataDelivery = [
          'name' => 'Reguler',
          'estimation' => '4 - 7 day',
          'cost' => 27000
        ];
        break;
      case 'economic':
        $this->dataDelivery = [
          'name' => 'Economic',
          'estimation' => '7 - 13 day',
          'cost' => 13000
        ];
        break;
    }
  }

  public function updateDelivery()
  {
    $this->selectDelivery();
    $this->calculateTotal();
  }

  public function destroyProduct($id)
  {
    $data = ModelsCart::find($id);

    if ($data) {
      $data->delete();

      $this->calculateTotal();
    }
  }

  public function checkout()
  {
    if (!$this->selectedDelivery) {
      $this->alert('error', 'Opps...', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showConfirmButton' => true,
        'confirmButtonText' => 'Ok',
        'text' => 'Please selected delivery type',
      ]);
      return;
    }
  }

  public function paymentSuccess()
  {
    Transaction::create([
      'code_order' => $this->codeTrx,
      'total_price' => $this->total,
      'payment_status' => 'Success',
      'snap_token' => $this->snapToken
    ]);

    foreach ($this->datas as $data) {
      Order::create([
        'user_id' => Auth::user()->id,
        'product_id' => (int) $data->product_id,
        'quantity' => (int) $data->quantity,
        'image' =>  $data->image,
        'price' => $data->price,
        'color' => $data->color,
        'order_type' => $this->selectedDelivery['name'],
        'estimation' => $this->selectedDelivery['estimation'],
        'cost' => (string) $this->selectedDelivery['cost'],
        'payment_method' => $this->selectPayment,
        'code' => $this->codeTrx
      ]);
    }

    foreach ($this->datas as $cartData) {
      ModelsCart::where('id', $cartData->id)->delete();
    }

    $this->redirect('tracking-order/' . $this->codeTrx);

    $this->alert('success', 'Success', [
      'position' => 'center',
      'timer' => 3000,
      'toast' => false,
      'timerProgressBar' => true,
      'showConfirmButton' => true,
      'confirmButtonText' => 'Ok',
      'text' => 'Payment Success',
    ]);
    return;
  }

  public function paymentCancel()
  {
    $this->alert('error', 'Canceled', [
      'position' => 'center',
      'timer' => 3000,
      'toast' => false,
      'timerProgressBar' => true,
      'showConfirmButton' => true,
      'confirmButtonText' => 'Ok',
      'text' => 'Payment Canceled',
    ]);
    return;
  }

  public function calculateTotal()
  {
    $this->selectDelivery();

    $this->total = 0;
    $this->subTotalProducts = 0;
    $products = ModelsCart::where('user_id', Auth::user()->id)->get();
    $this->totalQty = $products->sum('quantity');

    foreach ($products as $item) {
      $subtotal = $item->price * $item->quantity;
      $this->subTotalProducts += $subtotal;
    }

    $est = $this->dataDelivery['cost'] ?? 1000; // Nilai default jika tidak ada dataDelivery

    $this->total = $this->subTotalProducts + $est + $this->tax;
  }

  public function render()
  {
    // Get Size
    $this->datas = ModelsCart::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
    foreach ($this->datas as $data) {
      $product = Product::find($data->product_id);

      if ($product) {
        $prices = json_decode($product->prices, true);
        $size = array_search($data->price, $prices);
        $data->size = $size;
      }
    }
    // $this->selectedDelivery = 'faster';   // DEBUG
    if (!in_array($this->selectedDelivery, ['economic', 'reguler', 'faster'])) {
      $this->selectedDelivery = 'economic'; // Set default if invalid or not set
    }
    if (!in_array($this->selectedDelivery, ['economic', 'reguler', 'faster'])) {
      $this->selectedDelivery = 'reguler'; // Set default if invalid or not set
    }
    if (!in_array($this->selectedDelivery, ['economic', 'reguler', 'faster'])) {
      $this->selectedDelivery = 'economic'; // Set default if invalid or not set
    }

    // Check Product
    $isCart = ModelsCart::where('user_id', Auth::id())->first();
    session()->forget('cart_count');

    $this->codeTrx = Str::random(10);
    json_encode($this->codeTrx);

    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    \Midtrans\Config::$isProduction = config('midtrans.isProduction');
    \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
    \Midtrans\Config::$is3ds = config('midtrans.is3ds');

    $this->updateDelivery();

    $params = [
      'transaction_details' => [
        'order_id' => $this->codeTrx,
        'gross_amount' => $this->total,
      ],
      'customer_details' => [
        'first_name' => Auth::user()->name,
        'email' => Auth::user()->email,
      ],
    ];

    try {
      $this->snapToken = \Midtrans\Snap::getSnapToken($params);
    } catch (Exception $e) {
      $this->alert('error', 'Error', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showConfirmButton' => true,
        'confirmButtonText' => 'Ok',
        'text' => 'Failed to generate payment token',
      ]);
      return;
    }

    return view('livewire.pages.cart', [
      'datas' => $this->datas,
      'isCart' => $isCart,
      'province' => $this->provinceId,
      'regency' => $this->regencyId,
      'district' => $this->districtId,
      'village' => $this->villageId,
      'zipCode' => $this->zipCode,

      'totalQty' => $this->totalQty,
      'subTotalProducts' => $this->subTotalProducts,
      'dataDelivery' => $this->dataDelivery,
      'tax' => $this->tax,
      'total' => $this->total,

      'snap_token' => $this->snapToken
    ]);
  }
}
