<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
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
    public function mount()
    {
        // Show Address
        $this->provinceId = Province::find(Auth::user()->province_id);
        $this->regencyId = Regency::find(Auth::user()->regency_id);
        $this->districtId = District::find(Auth::user()->district_id);
        $this->villageId = Village::find(Auth::user()->village_id);
    }


    public function render()
    {
        $this->products = Order::where('user_id', Auth::user()->id)->get();
        $this->data = Order::where('user_id', Auth::user()->id)->first();
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
