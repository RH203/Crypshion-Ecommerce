<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
use App\Trait\Products;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Product')]
#[Layout('layouts.app_admin')]

class ProductDetail extends Component
{
    use Products;

    public $product;
    public $size;
    public $color;
    public $id;
    public $showImagePath;

    public function mount($id)
    {
        $this->id = $id;
        $this->showProduct();
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


    public function render()
    {
        return view('livewire.pages.app.product-detail', [
            'product' => $this->product,
            'size' => $this->size
        ]);
    }
}
