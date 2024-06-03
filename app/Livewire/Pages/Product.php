<?php

namespace App\Livewire\Pages;

use App\Models\app\Product as AppProduct;
use App\Models\Rating;
use App\Trait\Products;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.app')]
#[Title('Product')]


class Product extends Component
{
    use Products;

    public $products;
    public $search;

    public function mount()
    {
        $this->products = $this->getProducts(null);
    }

    public function render()
    {

        $products = AppProduct::all();

        // // $totalSold = [];
        $averageRatings = [];

        foreach ($products as $product) {
            // $totalSold[$product->id] = Transaction::where(['product_id' => $product->id, 'status' => 'Done'])->sum('quantity');
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');
        }


        AppProduct::orderBy('id', 'DESC')
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->get();

        return view('livewire.pages.product', [
            'products' => $this->products,
            'averageRatings' => $averageRatings,
        ]);
    }
}
