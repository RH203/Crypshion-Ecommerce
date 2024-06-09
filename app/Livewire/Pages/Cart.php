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
use App\Trait\PaymentS;
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
  use PaymentS;

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

  public $selectedDelivery;

  protected $listeners = ['Checkout' => 'PayS'];

  public function mount()
  {
    // Show Address
    $user = Auth::user();
    $this->provinceId = Province::find($user->province_id);
    $this->regencyId = Regency::find($user->regency_id);
    $this->districtId = District::find($user->district_id);
    $this->villageId = Village::find($user->village_id);
    $this->zipCode = $user->zip_code;
    $this->codeTrx = Str::random(10);
    $this->deliveries = Delivery::all();

    $this->calculateTotal();
    $this->dataSession();
  }

  public function connectWallet()
  {
    $this->dispatch('connect-wallet-event');
  }

  public function PayS()
  {
    $this->paymentSuccess();
  }

  public function updatedDelivery($value)
  {
    $this->selectedDelivery = Delivery::find($value);
    if ($this->selectedDelivery) {
      $this->deliveryCost = $this->selectedDelivery->cost;
    } else {
      $this->deliveryCost = 0;
    }

    // Recalculate total after changing delivery
    $this->calculateTotal();

    // Save data to session
    $this->dataSession();

    $this->dispatch('deliveryUpdated', [
      'total' => $this->total,
      'deliveryType' => $this->selectedDelivery->name,
      'deliveryCost' => $this->selectedDelivery->cost,
      'deliveryEstimation' => $this->selectedDelivery->estimation,
    ]);
  }

  public function dataSession()
  {
    session([
      'paymentMethod' => $this->selectPayment,
      'deliveryType' => $this->selectedDelivery['name'] ?? 'Reguler',
      'deliveryEstimation' => $this->selectedDelivery['estimation'] ?? '5 - 8',
      'deliveryCost' => $this->selectedDelivery['cost'] ?? 27000,
      'totalQty' => $this->totalQty,
      'subTotalProducts' => $this->subTotalProducts,
      'tax' => $this->tax,
      'total' => $this->total,
    ]);
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
    if (!$this->selectedDelivery) {
      $this->alert('error', 'Oops...', [
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
    $this->redirect('checkout');
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

    // $dataSession = session()->all();
    // dd($dataSession);

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
