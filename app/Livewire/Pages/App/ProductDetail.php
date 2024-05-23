<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Product')]
#[Layout('layouts.app_admin')]

class ProductDetail extends Component
{
    public $product;
    public $size;
    public $color;
    public $id;
    public $showImagePath;

    public function mount($id)
    {
        $this->id = $id;
        $this->loadProduct();
    }

    public function loadProduct()
    {

        $this->destroySession();

        // Gunakan ID sebagai bagian dari kunci session
        $product = session('product_' . $this->id);

        if ($product) {
            $this->product = $product;
        } else {
            // Jika tidak ada data di session, ambil data dari database dan simpan ke session
            $product = Product::findOrFail($this->id);

            // Decode JSON fields
            $product->images = json_decode($product->images, true) ?? [];
            $product->prices = json_decode($product->prices, true) ?? [];
            $product->sizes = json_decode($product->sizes, true) ?? [];
            $product->colors = json_decode($product->colors, true) ?? [];

            // Get the first image and price
            $product->first_image = $product->images[0] ?? null;

            // Get the lowest and highest price
            if (!empty($product->prices)) {
                $prices = array_values($product->prices);
                $product->lowest_price = min($prices);
                $product->highest_price = max($prices);
            } else {
                $product->lowest_price = null;
                $product->highest_price = null;
            }

            session(['product_' . $this->id => $product]);

            $this->product = $product;
        }
    }


    public function selectSize($size)
    {
        $this->size =  intval($size);
        session(['size' => $this->size]);
    }

    public function selectColor($color)
    {
        $this->color =  intval($color);
        session(['color' => $this->color]);
    }

    public function showImage($image)
    {
        $this->showImagePath = $image;
        session(['showImagePath' => $this->showImagePath]);
    }


    public function destroySession()
    {
        session()->forget('product_' . $this->id);
        session()->forget('showImagePath');
        session()->forget('size');
        session()->forget('color');
    }


    public function render()
    {

        return view('livewire.pages.app.product-detail', [
            'product' => $this->product,
            'size' => $this->size
        ]);
    }
}
