<?php

namespace App\Livewire\Pages;

use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use App\Models\app\Product;
use App\Models\Cart as ModelsCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Cart')]

class Cart extends Component
{


    public $selectPayment = '1';

    public $provinceId;
    public $regencyId;
    public $districtId;
    public $villageId;
    public $zipCode;


    public function mount()
    {
        $this->provinceId = Province::find(Auth::user()->province_id);
        $this->regencyId = Regency::find(Auth::user()->regency_id);
        $this->districtId = District::find(Auth::user()->district_id);
        $this->villageId = Village::find(Auth::user()->village_id);
        $this->zipCode = User::find(Auth::user()->id);
    }


    public function destroyProduct($id)
    {
        $data = ModelsCart::find($id);

        if ($data) {
            $data->delete();
        }
    }

    public function render()
    {
        $datas = ModelsCart::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        foreach ($datas as $data) {
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
            'datas' => $datas,
            'isCart' => $isCart,
            'province' => $this->provinceId,
            'regency' => $this->regencyId,
            'district' => $this->districtId,
            'village' => $this->villageId,
            'zipCode' => $this->zipCode,
        ]);
    }
}
