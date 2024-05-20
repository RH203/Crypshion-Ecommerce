<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profile')]
    #[Layout('layouts.app')]

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
