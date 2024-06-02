<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product as AppProduct;
use App\Models\Notification;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Show Orders')]
#[Layout('layouts.app_admin')]

class OrderShow extends Component
{
    public $datas;
    public $customerData;
    public $totalQty = 0;
    public $tax = 1000;
    public $subTotalProducts = 0;
    public $total = 0;
    public $code;

    public function mount($code)
    {
        $this->code = $code;
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->datas = Order::where('code', $this->code)->get();

        foreach ($this->datas as $data) {
            $product = AppProduct::find($data->product_id);

            if ($product) {
                $prices = json_decode($product->prices, true);
                $size = array_search($data->price, $prices);
                $data->size = $size;
            }
        }

        $orders = Order::where('code', $this->code)
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('code');

        $this->customerData = $orders->map(function ($group) {
            return $group->first();
        });

        $this->subTotalProducts = 0;
        $products = Order::where('code', $this->code)->get();
        $this->totalQty = $products->sum('quantity');

        foreach ($products as $item) {
            $subtotal = $item->price * $item->quantity;
            $this->subTotalProducts += $subtotal;
        }

        $this->total = $this->subTotalProducts + $this->tax;
    }

    public function confirm($code)
    {
        if ($code) {
            Order::where('code', $code)->update(['status' => 'Packaged']);
            $this->loadOrders();

            $customer = Order::where('code', $code)->first();
            Notification::create([
                'user_id' => $customer->user_id,
                'status' => 'Packaged',
            ]);
        }
    }

    public function delivered($code)
    {
        if ($code) {
            Order::where('code', $code)->update(['status' => 'Delivered']);
            $this->loadOrders();

            $customer = Order::where('code', $code)->first();
            Notification::create([
                'user_id' => $customer->user_id,
                'status' => 'Delivered',
            ]);
        }
    }

    public function completed($code)
    {
        if ($code) {
            Order::where('code', $code)->update(['status' => 'Completed']);
            $this->loadOrders();

            $customer = Order::where('code', $code)->first();
            Notification::create([
                'user_id' => $customer->user_id,
                'status' => 'Completed',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.app.order-show', [
            'datas' => $this->datas,
            'customerData' => $this->customerData,
            'totalQty' => $this->totalQty,
            'subTotalProducts' => $this->subTotalProducts,
            'tax' => $this->tax,
            'total' => $this->total,
        ]);
    }
}
