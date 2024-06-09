<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\UserSession;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{

    use LivewireAlert;

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
                UserSession::create([
                    'user_id' => Auth::user()->id,
                    'login_at' => now(),
                    'logout_at' => null
                ]);
                return redirect()->intended('app/dashboard');
            }
            if (Auth::user()->hasRole('user')) {
                UserSession::create([
                    'user_id' => Auth::user()->id,
                    'login_at' => now(),
                    'logout_at' => null
                ]);
                return redirect()->intended('/');
            }
        } else {
            $this->reset('password');
            $this->alert('error', 'Opps', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'Ok',
                'text' => 'Incorrect Email or Password',
            ]);
            // $this->addError('loginInvalid', 'Incorrect Email or Password');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
