<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public $firstOrders;

    public $province;
    public $regency;
    public $district;
    public $village;

    public function mount()
    {
        // Fetch the authenticated user's address details
        $this->province = Province::find(Auth::user()->province_id);
        $this->regency = Regency::find(Auth::user()->regency_id);
        $this->district = District::find(Auth::user()->district_id);
        $this->village = Village::find(Auth::user()->village_id);
    }

    public function render()
    {
        // Retrieve the orders for the authenticated user, ordered by 'id' in descending order
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('code');

        // Retrieve the first order from each group
        $this->firstOrders = $orders->map(function ($group) {
            return $group->first();
        });

        return view('livewire.pages.orders', [
            'products' => $this->firstOrders,
            'province' => $this->province,
            'regency' => $this->regency,
            'district' => $this->district,
            'village' => $this->village,
        ]);
    }
}
