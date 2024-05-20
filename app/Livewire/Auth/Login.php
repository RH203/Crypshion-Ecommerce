<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login')]
    #[Layout('layouts.auth')]

    public $email;
    public $password;

    public function login()
    {
        $credentials = $this->validate([
            'email' => ['required', 'min:6', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('app/dashboard');
            }
            if (Auth::user()->hasRole('user')) {
                return redirect()->intended('/');
            }
        } else {
            $this->reset('password');
            $this->addError('loginInvalid', 'Incorrect Email or Password');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
