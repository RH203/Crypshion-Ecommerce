<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    use LivewireAlert;

    #[Title('Register')]
    #[Layout('layouts.auth')]


    public $name;
    public $email;
    public $password;
    public $confirmPassword;


    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6',
        ];
    }

    public function register()
    {
        $this->validate();

        if ($this->password !== $this->confirmPassword) {
            $this->alert('error', 'Opps', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'Ok',
                'text' => 'Confirm Password is Invalid',
            ]);
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
