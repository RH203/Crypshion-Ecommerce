<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Category as AppCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Category')]
#[Layout('layouts.app_admin')]


class Category extends Component
{
    use WithFileUploads, LivewireAlert;

    public $title;
    public $image;
    public $categoryId;
    public $isEdit = false;
    public $currentImage;

    // Rule validation input data category
    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'image' => 'required|max:1024|mimes:jpg,jpeg,png'
        ];
    }

    // Add data category to database
    public function store()
    {
        $this->validate();
        $imageName = 'category_' . Str::random(5) . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('file/category', $imageName, 'public');
        AppCategory::create([
            'title' => $this->title,
            'image' => $imageName
        ]);
        $this->reset(['title', 'image']);
        $this->alert('success', 'Created data successfully');
    }

    // Delete data category to database
    public function delete($id)
    {
        $data = AppCategory::findOrFail($id);

        if ($data) {
            Storage::disk('public')->delete('file/category/' . $data->image);
            $data->delete();
        }
        $this->alert('success', 'Deleted data successfully');
    }

    // Edit data category to database
    public function edit($id)
    {
        $data = AppCategory::findOrFail($id);
        $this->categoryId = $id;
        $this->title = $data->title;
        $this->currentImage = $data->image;
        $this->isEdit = true;
    }

    // Update data category to database
    public function update()
    {
        $rules = [
            'title' => 'required|min:2',
            'image' => 'required|max:1024|mimes:jpg,jpeg,png'
        ];

        if (!$this->image) {
            $rules['image'] = 'nullable';
        }

        $this->validate($rules);

        $data = AppCategory::findOrFail($this->categoryId);

        if ($this->image) {
            // Delete the old image
            Storage::disk('public')->delete('file/category/' . $data->image);
            // Store the new image
            $imageName = 'category_' . Str::random(5) . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('file/category', $imageName, 'public');
            $data->image = $imageName;
        }

        $data->title = $this->title;
        $data->save();

        $this->resetInputFields();
        $this->alert('success', 'Updated data successfully');
    }

    // Reset input fields
    public function resetInputFields()
    {
        $this->title = '';
        $this->image = null;
        $this->categoryId = null;
        $this->isEdit = false;
    }


    public function render()
    {
        return view('livewire.pages.app.category', [
            'datas' => AppCategory::all()
        ]);
    }
}
