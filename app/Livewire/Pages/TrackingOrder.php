<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tracking Order')]
#[Layout('layouts.app')]

class TrackingOrder extends Component
{
    public $products;
    public $data;

    public $provinceId;
    public $regencyId;
    public $districtId;
    public $villageId;


    // Mounted
    public function mount($code)
    {
        // Show Address
        $this->provinceId = Province::find(Auth::user()->province_id);
        $this->regencyId = Regency::find(Auth::user()->regency_id);
        $this->districtId = District::find(Auth::user()->district_id);
        $this->villageId = Village::find(Auth::user()->village_id);

        $this->products = Order::where('code', $code)->get();
        $this->data = Order::where('code', $code)->first();

        foreach ($this->products as $data) {
            $product = Product::find($data->product_id);
            if ($product) {
                $prices = json_decode($product->prices, true);
                $size = array_search($data->price, $prices);
                $data->size = $size;
            }
        }
    }


    public function render()
    {



        return view('livewire.pages.tracking-order', [
            'products' => $this->products,
            'data' => $this->data,
            'province' => $this->provinceId,
            'regency' => $this->regencyId,
            'district' => $this->districtId,
            'village' => $this->villageId,
        ]);
    }
}
