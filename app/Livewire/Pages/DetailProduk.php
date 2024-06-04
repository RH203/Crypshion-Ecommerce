<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Rating;
use App\Models\User;
use App\Trait\Products;
use DOMDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Detail Produk')]
class DetailProduk extends Component
{
  use Products, LivewireAlert;

  // public $products;
  public $size;
  public $color;
  public $id;
  public $showImagePath;
  public $dataIcon;
  public $product;
  public $completeProfile = true;



  public $quantity = 1;

  public function mount($id)
  {
    $this->id = $id;
    $this->showProduct();
    // $this->products = $this->getProducts(5);
  }

  // public function hydrate()
  // {
  //   $this->products = $this->getProducts(5);
  // }

  public function selectSize($size)
  {
    $this->size = intval($size);
    session(['size' => $this->size]);
  }

  public function selectColor($color)
  {
    $this->color = intval($color);
    session(['color' => $this->color]);
  }

  public function showImage($image)
  {
    $this->showImagePath = $image;
    session(['showImagePath' => $this->showImagePath]);
  }

  public function increment()
  {
    $this->quantity++;
  }

  public function decrement()
  {
    if ($this->quantity > 1) {
      $this->quantity--;
    }
  }


  public function addToCart()
  {


    try {
      $this->validate([
        'quantity' => 'required|integer|min:1',
        'color' => 'required|string',
        'size' => 'required|string',
      ]);

      $data = [
        'user_id' => Auth::user()->id,
        'product_id' => (int) $this->id,
        'quantity' => (int) $this->quantity,
        'image' =>  $this->showImagePath ?? session('product_' . $this->id . '.first_image'),
        'price' => $this->size,
        'color' => $this->color,
      ];

      Cart::create($data);
      $this->reset(['size', 'color', 'quantity']);
      // Update cart count in session
      $cartCount = session('cart_count', 0) + 1;
      session(['cart_count' => $cartCount]);
      $this->dispatch('cart_count', $cartCount);
      session()->forget('size');
      session()->forget('color');
    } catch (ValidationException $e) {
      $this->alert('error', 'Oops...', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showConfirmButton' => true,
        'confirmButtonText' => 'Ok',
        'text' => 'Please choose Image, size and color',
      ]);
    }
  }


  public function icon()
  {
    $dataIcon = [
      ['icon' => '<iconify-icon icon="carbon:favorite"></iconify-icon>'],
      ['icon' => '<iconify-icon icon="bi:cart"></iconify-icon>'],
      ['icon' => '<iconify-icon icon="mdi:eye"></iconify-icon>'],
    ];
    $this->dataIcon = $dataIcon;
  }

  public function render()
  {
    if (Auth::check()) {

      $dataProfile = User::where('id', Auth::user()->id)
        ->where(function ($query) {
          $query->whereNull('phone_number')
            ->orWhereNull('address')
            ->orWhereNull('province_id');
        })
        ->first();
      $this->completeProfile = true;
      if ($dataProfile) {
        $this->completeProfile = false;
      }
    }

    // get rating
    $product = Product::find($this->id);
    $averageRatings = Rating::where('product_id', $product->id)->avg('rating');

    // Sold Quantity
    if ($product) {
      $soldQuantity = Order::where('product_id', $product->id)
        ->sum('quantity');
    } else {
      $soldQuantity = 0;
    }

    // Review
    $ratingProductCount = Rating::where('product_id', $this->id)->whereNotNull('review')->get();
    $reviewCount = 0;
    foreach ($ratingProductCount as $review) {
      if ($review->review != null) {
        $reviewCount++;
      }
    }


    return view('livewire.pages.detail-produk', [
      'isComplete' => $this->completeProfile,
      'datas' => $this->dataIcon,
      // 'products' => $this->products,
      'averageRatings' => $averageRatings,
      'sold' => $soldQuantity,
      'ratingProductCount' => $ratingProductCount,
      'reviewCount' => $reviewCount,
    ]);
  }
}
