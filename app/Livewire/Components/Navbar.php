<?php

namespace App\Livewire\Components;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $cartCount;
    public $notification;

    #[On('cart_count')]
    public function mount()
    {
        $this->cartCount = session('cart_count', 0);
    }


    public function render()
    {
        if (Auth::check()) {
            $this->notification = Notification::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        return view('livewire.components.navbar', [
            'notification' => $this->notification
        ]);
    }
}
