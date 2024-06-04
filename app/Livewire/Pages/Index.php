<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Subscribe;
use App\Trait\Products;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
#[Layout('layouts.app')]

class Index extends Component
{
    use LivewireAlert;

    use Products;
    public $products;
    public $email;

    public function mount()
    {
        $this->products = $this->getProducts(5);
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|unique:subscribes,email'
        ]);

        Subscribe::create([
            'email' => $this->email
        ]);

        $this->alert('success', 'Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ok',
            'text' => 'Thanks for subscribe',
        ]);

        $this->reset('email');
    }

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
