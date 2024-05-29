<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Cart as ModelsCart;
use App\Models\Order;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Cart')]

class Cart extends Component
{
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
  public $dataDelivery = [
    'name' => '',
    'estimation' => '',
    'cost' => 0,
  ];
  public $selectedDelivery;
  public $total = 0;




  // Mounted
  public function mount()
  {
    // Show Address
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

  // Select Delivery
  public function saveChanges()
  {
    if ($this->selectedDelivery === 'faster') {
      $this->dataDelivery = [
        'name' => 'Faster',
        'estimation' => '2 - 4 day',
        'cost' => 35000
      ];
    }
    if ($this->selectedDelivery === 'reguler') {
      $this->dataDelivery = [
        'name' => 'Reguler',
        'estimation' => '4 - 7 day',
        'cost' => 27000
      ];
    }
    if ($this->selectedDelivery === 'economic') {
      $this->dataDelivery = [
        'name' => 'Economic',
        'estimation' => '7 - 13 day',
        'cost' => 13000
      ];
    }
    $this->selectedDelivery = $this->dataDelivery;
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
    try {
      // Generate code transactions
      $codeTrx = Str::random(10);
      // Add to table order
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
          'code' => $codeTrx
        ]);
      }
      // Delete data forom
      foreach ($this->datas as $cartData) {
        ModelsCart::where('id', $cartData->id)->delete();
      }
    } catch (ValidationException $e) {
      $this->alert('error', 'Validation Error', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showConfirmButton' => true,
        'confirmButtonText' => 'Ok',
        'text' => 'Please choose Image, size and color',
      ]);
    }
  }


  // Render Component
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

    // Check Product
    $isCart = ModelsCart::where('user_id', Auth::id())->first();
    session()->forget('cart_count');


    // Calculate Subtotal
    $this->subTotalProducts = 0;
    $products = ModelsCart::where('user_id', Auth::user()->id)->get();
    $this->totalQty = $products->sum('quantity');

    foreach ($products as $item) {
      $subtotal = $item->price * $item->quantity;
      $this->subTotalProducts += $subtotal;
    }

    // Total
    $this->total = ($this->subTotalProducts + $this->dataDelivery['cost'] + $this->tax);


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
    ]);
  }
}
