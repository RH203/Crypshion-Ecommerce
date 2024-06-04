<?php

namespace App\Livewire\Pages;

use App\Models\app\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Category')]
#[Layout('layouts.app')]

class Category extends Component
{
    public $categoryData;

    public function mount($id)
    {
        $this->categoryData = Product::where('category_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.pages.category');
    }
}
