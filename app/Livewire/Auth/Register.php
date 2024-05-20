<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    #[Title('Register')]
    #[Layout('layouts.auth')]


    public $name;
    public $email;
    public $password;
    public $confirmPassword;

    public function register()
    {
        $validate = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6',
        ]);


        if ($validate['password'] !== $this->confirmPassword) {
            $this->addError('confirmPasswordInvalid', 'Confirm Password is Invalid');
            $this->reset(['password', 'confirmPassword']);
            return;
        }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => User::AVATAR,
        ]);

        $user->assignRole('user');
        Auth::login($user);
        return redirect()->intended('/');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
