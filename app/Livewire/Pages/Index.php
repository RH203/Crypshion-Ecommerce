<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
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

        // // $totalSold = [];
        $averageRatings = [];

        foreach ($products as $product) {
            // $totalSold[$product->id] = Transaction::where(['product_id' => $product->id, 'status' => 'Done'])->sum('quantity');
            $averageRatings[$product->id] = Rating::where('product_id', $product->id)->avg('rating');
        }



        return view('livewire.pages.index', [
            'products' => $this->products,
            'averageRatings' => $averageRatings,

        ]);
    }
}
