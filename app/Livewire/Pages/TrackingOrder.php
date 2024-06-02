<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tracking Order')]
#[Layout('layouts.app')]

class TrackingOrder extends Component
{
    use LivewireAlert;

    public $products;
    public $data;

    public $provinceId;
    public $regencyId;
    public $districtId;
    public $villageId;

    public $totalQty = 0;
    public $tax = 1000;
    public $subTotalProducts = 0;
    public $total = 0;
    public $code;


    // Mounted
    public function mount($code)
    {
        $this->code = $code;
        // Show Address
        $this->provinceId = Province::find(Auth::user()->province_id);
        $this->regencyId = Regency::find(Auth::user()->regency_id);
        $this->districtId = District::find(Auth::user()->district_id);
        $this->villageId = Village::find(Auth::user()->village_id);

        $this->products = Order::where('code', $code)->get();
        $this->data = Order::where('code', $code)->first();
    }



    public function cancelOrder($code)
    {
        if ($code) {
            Order::where('code', $code)->update(['status' => 'Canceled']);


            $this->alert('success', 'Success', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'showConfirmButton' => true,
                'confirmButtonText' => 'Ok',
                'text' => 'Order Canceled',
            ]);

            // $this->redirect('tracking-order/' . $this->codeTrx);
        }
    }


    public function render()
    {
        foreach ($this->products as $data) {
            $product = Product::find($data->product_id);
            if ($product) {
                $prices = json_decode($product->prices, true);
                $size = array_search($data->price, $prices);
                $data->size = $size;
            }
        }

        // Calculate
        $this->subTotalProducts = 0;
        $products = Order::where('code', $this->code)->where('user_id', Auth::user()->id)->get();
        $this->totalQty = $products->sum('quantity');

        foreach ($products as $item) {
            $subtotal = $item->price * $item->quantity;
            $this->subTotalProducts += $subtotal;
        }

        $this->total = $this->subTotalProducts + $this->tax;


        return view('livewire.pages.tracking-order', [
            'products' => $this->products,
            'data' => $this->data,
            'province' => $this->provinceId,
            'regency' => $this->regencyId,
            'district' => $this->districtId,
            'village' => $this->villageId,
            'totalQty' => $this->totalQty,
            'subTotalProducts' => $this->subTotalProducts,
            'tax' => $this->tax,
            'total' => $this->total,
        ]);
    }
}
