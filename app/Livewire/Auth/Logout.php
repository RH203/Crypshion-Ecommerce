<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        Auth::logout();
        $this->session()->invalidate();
        $this->session()->regenerateToken();
        return redirect('/');
    }
}
