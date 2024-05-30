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

#[Title('Orders')]
#[Layout('layouts.app')]

class Orders extends Component
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
        // Retrieve and group the orders by 'code' for the authenticated user, ordered by 'id' in descending order
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('code');

        // Map each group to the first item in the group
        $filteredOrders = $orders->map(function ($group) {
            return $group->first();
        });

        // Retrieve the first order for the authenticated user
        $firstOrder = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();

        return view('livewire.pages.orders', [
            'products' => $filteredOrders,
            'data' => $firstOrder,
            'province' => $this->provinceId,
            'regency' => $this->regencyId,
            'district' => $this->districtId,
            'village' => $this->villageId,
        ]);
    }
}
