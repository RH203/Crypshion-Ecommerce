<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    use LivewireAlert;

    #[Title('Profile')]
    #[Layout('layouts.app')]

    public $name;
    public $email;
    public $phone_number = '';
    public $address = '';


    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'email',
            'phone_number' => 'required',
            'address' => 'required'
        ];
    }


    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->address = $user->address;
    }

    public function updateProfile()
    {
        // Validated data
        $this->validate();

        // Get data
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address
        ];

        // Update data
        User::where('id', Auth::user()->id)->update($data);

        // Notification
        $this->alert('success', 'Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Oke',
            'text' => 'Update data successfully',
        ]);
    }

    public function render()
    {
        $dataProfile = User::where('id', Auth::user()->id)
            ->where(function ($query) {
                $query->whereNull('phone_number')
                    ->orWhereNull('address');
            })
            ->first();

        $completeProfile = true;
        if ($dataProfile) {
            $completeProfile = false;
        }

        return view('livewire.pages.profile', [
            'isComplete' => $completeProfile
        ]);
    }
}
