<?php

namespace App\Livewire\Pages;

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

    public function mount()
    {
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
        // Ambil semua data keranjang untuk pengguna yang sedang login
        $datas = ModelsCart::where('user_id', Auth::id())->get();

        foreach ($datas as $data) {
            $product = Product::find($data->product_id);

            if ($product) {
                // Decode kolom prices dari JSON ke array
                $prices = json_decode($product->prices, true);

                // Cari ukuran berdasarkan harga
                $size = array_search($data->price, $prices);
                $data->size = $size; // Tambahkan size ke item data keranjang
            }
        }
        // Ambil data keranjang pertama untuk pengguna yang sedang login
        $isCart = ModelsCart::where('user_id', Auth::id())->first();

        // Hapus sesi 'cart_count' (opsional, tergantung pada kebutuhan aplikasi Anda)
        session()->forget('cart_count');

        // Kirim data ke view
        return view('livewire.pages.cart', [
            'datas' => $datas,
            'isCart' => $isCart,
        ]);
    }
}
