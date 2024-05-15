<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardProduct extends Component
{

    public $image;
    public $title;
    public $description;
    public $price;
    public $rating;

    public function mount($image, $title, $description, $price, $rating = 3.5)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->rating = $rating;
    }




    public function render()
    {
        return view('livewire.components.card-product');
    }
}
