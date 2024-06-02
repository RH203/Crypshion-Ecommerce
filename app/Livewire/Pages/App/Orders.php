<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Orders')]
#[Layout('layouts.app_admin')]

class Orders extends Component
{
    public $firstOrders;
    public $datas;

    public function mount()
    {
        $this->loadOrders();
    }

    public function loadOrders()
    {
        // Retrieve the orders for the authenticated user, ordered by 'id' in descending order
        $orders = Order::orderBy('id', 'DESC')
            ->get()
            ->groupBy('code');


        // Retrieve the first order from each group
        $this->firstOrders = $orders->map(function ($group) {
            return $group->first();
        });


        // Add size information to the products in the firstOrders collection
        foreach ($this->firstOrders as $order) {
            $product = Product::find($order->product_id);
            if ($product) {
                $prices = json_decode($product->prices, true);
                $size = array_search($order->price, $prices);
                $order->size = $size;
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.app.orders', [
            'products' => $this->firstOrders,



        ]);
    }
}
