<?php

namespace App\Livewire\Pages;

use App\Trait\Products;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Detail Produk')]

class DetailProduk extends Component
{
  use Products;

  public $products;
  public $size;
  public $color;
  public $id;
  public $showImagePath;
  public $dataIcon;

  public function mount($id)
  {
    $this->id = $id;
    $this->showProduct($this->products, $this->id);
    $this->products = $this->getProducts(5);
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

    return view('livewire.pages.detail-produk', [
      'datas' => $this->dataIcon,
      'products' => $this->products,
      'size' => $this->size
    ]);
  }
}
