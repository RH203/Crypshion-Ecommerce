<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
use App\Models\Order;
use App\Models\Rating;
use App\Trait\Products;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
#[Layout('layouts.app')]

class Index extends Component
{
    use Products;
    public $products;
    // public $averageRatings;

    public function mount()
    {
        $this->products = $this->getProducts(5);
    }

    // public function getRatings()
    // {
    //     $ratings = Rating::whereBetween('rating', [1, 5])->get();
    //     $averageRatings = $ratings->groupBy('product_id')->map(function ($productRatings) {
    //         return $productRatings->avg('rating');
    //     });
    //     return $averageRatings;
    // }




    // return view('pages.app.menu', [
    //     'data' => Menu::all(),
    //     'totalSold' => $totalSold,
    //     'averageRatings' => $averageRatings,
    // ]);


    public function render()
    {

        $products = Product::all();
        $averageRatings = [];
        $soldQuantities = []; // Array to store sold quantities for each product

        foreach ($products as $product) {
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');

            // Calculate sold quantity for each product
            $soldQuantities[$product->id] = Order::where('product_id', $product->id)->sum('quantity');
        }



        return view('livewire.pages.index', [
            'products' => $this->products,
            'averageRatings' => $averageRatings,
            'soldQuantities' => $soldQuantities
        ]);
    }
}
