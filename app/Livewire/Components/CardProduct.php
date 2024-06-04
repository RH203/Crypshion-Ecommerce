<?php

namespace App\Livewire\Components;

use App\Models\app\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CardProduct extends Component
{

  use LivewireAlert;

  public $productId;
  public $image;
  public $title;
  public $description;
  public $price;
  public $rating;
  public $sold;
  public $url;


  public function mount($productId = null, $image, $title, $description, $price, $rating = 0, $sold, $url = '#')
  {
    $this->productId = $productId;
    $this->image = $image;
    $this->title = $title;
    $this->description = $description;
    $this->price = $price;
    $this->rating = $rating;
    $this->sold = $sold;
    $this->url = $url;
  }


  public function destroy()
  {
    $product = Product::find($this->productId);

    if ($product) {
      $images = json_decode($product->images, true);
      if (is_array($images)) {
        foreach ($images as $image) {
          $filePath = public_path('storage/' . str_replace('\/', '/', $image));
          if (file_exists($filePath)) {
            unlink($filePath);
          }
        }
      }
      $product->delete();
      $this->alert('success', 'Deleted product successfully');
      $this->dispatch('product-deleted', productId: $this->productId);
    }
  }


  // public function getRatings()
  // {
  //   $ratings = Rating::whereBetween('rating', [1, 5])->get();

  //   $averageRatings = $ratings->groupBy('product_id')->map(function ($productRatings) {
  //     return $productRatings->avg('rating');
  //   });

  //   return $averageRatings;
  // }


  public function render()
  {
    return view('livewire.components.card-product', [
      // 'averageRatings' => $this->getRatings(),
    ]);
  }
}
