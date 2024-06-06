<?php

namespace App\Trait;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

trait PaymentS
{

  use LivewireAlert;

  public $datas;
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


  public function mount()
  {
    // Show Address
    $this->provinceId = Province::find(Auth::user()->province_id);
    $this->regencyId = Regency::find(Auth::user()->regency_id);
    $this->districtId = District::find(Auth::user()->district_id);
    $this->villageId = Village::find(Auth::user()->village_id);
    $this->zipCode = User::find(Auth::user()->id);

    $this->codeTrx = Str::random(10);
  }

  // Payment Success
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
        'image' => $data->image,
        'price' => $data->price,
        'color' => $data->color,
        'order_type' => session('deliveryType'),
        'estimation' => session('deliveryEstimation'),
        'cost' => (string) session('deliveryCost'),
        'payment_method' => session('paymentMethod'),
        'code' => $this->codeTrx
      ]);

      $product = Product::find($data->product_id);

      if ($product) {
        $newStock = $product->stock - $data->quantity;

        if ($newStock < 0) {
          throw new Exception('Insufficient stock for product ID: ' . $data->product_id);
        }

        $product->stock = $newStock;
        $product->save();
      } else {
        throw new Exception('Product not found for ID: ' . $data->product_id);
      }
    }

    foreach ($this->datas as $cartData) {
      Cart::where('id', $cartData->id)->delete();
    }


    $this->alert('success', 'Success', [
      'position' => 'center',
      'timer' => 3000,
      'toast' => false,
      'timerProgressBar' => true,
      'showConfirmButton' => true,
      'confirmButtonText' => 'Ok',
      'text' => 'Payment Success',
    ]);

    // Session::flush();
    session()->forget('paymentMethod');
    session()->forget('deliveryType');
    session()->forget('deliveryEstimation');
    session()->forget('deliveryCost');
    session()->forget('totalQty');
    session()->forget('subTotalProducts');
    session()->forget('tax');
    session()->forget('deliveryCost');
    session()->forget('total');

    $this->redirect('tracking-order/' . $this->codeTrx);


    return;
  }
}
