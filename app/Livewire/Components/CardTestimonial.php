<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardTestimonial extends Component
{
    public $rating;
    public $message;
    public $image;
    public $name;
    public $label;

    public function mount($rating = 0, $message, $image, $name, $label = 'Best User')
    {
        $this->rating = $rating;
        $this->message = $message;
        $this->image = $image;
        $this->name = $name;
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.components.card-testimonial');
    }
}
