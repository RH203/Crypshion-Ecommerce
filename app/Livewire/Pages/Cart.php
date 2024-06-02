<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Cart as ModelsCart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
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

  public $deliveries;
  public $delivery;
  public $deliveryCost = 0;

  protected $listeners = ['Checkout' => 'checkout'];

  // Mounted
  public function mount()
  {
    // Show Address
    $this->provinceId = Province::find(Auth::user()->province_id);
    $this->regencyId = Regency::find(Auth::user()->regency_id);
    $this->districtId = District::find(Auth::user()->district_id);
    $this->villageId = Village::find(Auth::user()->village_id);
    $this->zipCode = User::find(Auth::user()->id);

    $this->deliveries = Delivery::all();

    $this->calculateTotal();
  }


  public function connectWallet()
  {
    $this->dispatch('connect-wallet-event');
  }



  public function updatedDelivery($value)
  {
    $selectedDelivery = Delivery::find($value);
    if ($selectedDelivery) {
      $this->deliveryCost = $selectedDelivery->cost;
    } else {
      $this->deliveryCost = 0;
    }

    // Hitung total kembali setelah mengubah pengiriman
    $this->calculateTotal();

    // Simpan data ke sesi
    session(['paymentMethod' => $this->selectPayment]);
    session(['deliveryType' => $selectedDelivery->name]);
    session(['deliveryEstimation' => $selectedDelivery->estimation]);
    session(['deliveryCost' => $selectedDelivery->cost]);
    session(['totalQty' => $this->totalQty]);
    session(['subTotalProducts' => $this->subTotalProducts]);
    session(['tax' => $this->tax]);
    session(['deliveryCost' => $this->deliveryCost]);
    session(['total' => $this->total]);
  }


  // Calculate Total
  public function calculateTotal()
  {
    $this->subTotalProducts = 0;
    $products = ModelsCart::where('user_id', Auth::user()->id)->get();
    $this->totalQty = $products->sum('quantity');

    foreach ($products as $item) {
      $subtotal = $item->price * $item->quantity;
      $this->subTotalProducts += $subtotal;
    }

    $this->total = $this->subTotalProducts + $this->tax + $this->deliveryCost;
  }

  // Destroy Product
  public function destroyProduct($id)
  {
    $data = ModelsCart::find($id);

    if ($data) {
      $data->delete();
    }
  }

  // Checkout
  public function checkout()
  {
    if (!$this->delivery) {
      $this->alert('error', 'Opps...', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showConfirmButton' => true,
        'confirmButtonText' => 'Ok',
        'text' => 'Please select a delivery type',
      ]);
      return;
    }
  }

  // Render Component
  public function render()
  {
    $this->datas = ModelsCart::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
    foreach ($this->datas as $data) {
      $product = Product::find($data->product_id);

      if ($product) {
        $prices = json_decode($product->prices, true);
        $size = array_search($data->price, $prices);
        $data->size = $size;
      }
    }

    $isCart = ModelsCart::where('user_id', Auth::id())->first();
    session()->forget('cart_count');

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
      'tax' => $this->tax,
      'total' => $this->total,

      'snap_token' => $this->snapToken,

      'deliveries' => $this->deliveries,
    ]);
  }
}
