<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Category;
use App\Models\app\Product;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add Product')]
#[Layout('layouts.app_admin')]


class ProductAdd extends Component
{

    use WithFileUploads, LivewireAlert;


    public $title;
    public $description;
    public $category_id = "1";
    public $sizes = [];
    public $prices = [];
    public $colors = [];
    public $newTag = '';
    public $images = [];
    public $stock;


    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'sizes' => 'required|array',
            'prices' => 'array',
            'colors' => 'array',
            'images.*' => 'required|image|max:1024',
            'stock' => 'required'
        ]);

        $storedImages = [];
        foreach ($this->images as $image) {
            $imageName = 'product_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
            $storedPath = $image->storeAs('file/product', $imageName, 'public');
            $storedImages[] = $storedPath;
        }

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'sizes' => json_encode($this->sizes),
            'prices' => json_encode($this->prices),
            'colors' => json_encode($this->colors),
            'images' => json_encode($storedImages),
            'stock' => $this->stock
        ];

        Product::create($data);
        $this->reset(['title', 'description', 'category_id', 'sizes', 'prices', 'colors', 'images', 'stock']);
        $this->alert('success', 'Created product successfully');
    }


    public function addTag()
    {
        $this->newTag = trim($this->newTag);

        if ($this->newTag && !in_array($this->newTag, $this->colors)) {
            $this->colors[] = $this->newTag;
        }

        $this->newTag = '';
    }

    public function removeTag($index)
    {
        unset($this->colors[$index]);
        $this->colors = array_values($this->colors);
    }

    public function render()
    {
        return view('livewire.pages.app.product-add', [
            'categories' => Category::all()
        ]);
    }
}
