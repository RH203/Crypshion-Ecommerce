<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Category;
use App\Models\app\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Product')]
#[Layout('layouts.app_admin')]


class ProductAdd extends Component
{
    public $title;
    public $description;
    public $category_id = "1";
    public $sizes = [];


    public function store()
    {
        // $this->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'category' => 'required|string',
        //     'sizes' => 'array',
        // ]);

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'size' => json_encode($this->sizes),
        ];

        dd($data);
        // dump($data);
        // Log::info('Store method called', ['data' => $data]);
        // dd($data);
        // Product::create($data);
    }


    public function render()
    {

        return view('livewire.pages.app.product-add', [
            'categories' => Category::all()
        ]);
    }
}
