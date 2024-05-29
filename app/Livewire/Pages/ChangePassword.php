<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Change Password')]
#[Layout('layouts.app')]

class ChangePassword extends Component
{
    use LivewireAlert;

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function rules()
    {
        return [
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required',
        ];
    }

    public function changePassword()
    {
        $this->validate();

        if (Hash::check($this->currentPassword, Auth::user()->password)) {
            if ($this->newPassword === $this->confirmPassword) {
                User::where('id', Auth::user()->id)->update(['password' => Hash::make($this->newPassword)]);
                $this->alert('success', 'Success', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => false,
                    'timerProgressBar' => true,
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'confirmButtonText' => 'Ok',
                    'text' => 'Password updated successfully',
                ]);

                $this->reset(['currentPassword', 'newPassword', 'confirmPassword']);
            } else {
                $this->alert('error', 'Oops', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => false,
                    'timerProgressBar' => true,
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'confirmButtonText' => 'Ok',
                    'text' => 'Confirm Password Invalid',
                ]);
            }
        } else {
            $this->alert('error', 'Oops', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'Ok',
                'text' => 'Incorrect Password',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.change-password');
    }
}
