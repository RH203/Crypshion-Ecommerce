<?php

namespace App\Livewire\Pages;

use App\Models\User;
use App\Models\Api\District;
use App\Models\Api\Province;
use App\Models\Api\Regency;
use App\Models\Api\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Profile')]
#[Layout('layouts.app')]

class Profile extends Component
{
    use LivewireAlert, WithFileUploads;

    public $name;
    public $email;
    public $phone_number = '';
    public $address = '';
    public $zip_code = '';
    public $avatar;

    public $provinceId;
    public $regencyId;
    public $districtId;
    public $villageId;

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'provinceId' => 'required',
            'regencyId' => 'required',
            'districtId' => 'required',
            'villageId' => 'required',
            'avatar' => 'nullable|image|max:1024',
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->address = $user->address;
        $this->provinceId = $user->province_id;
        $this->regencyId = $user->regency_id;
        $this->districtId = $user->district_id;
        $this->villageId = $user->village_id;
        $this->zip_code = $user->zip_code;
    }

    public function updateProfile()
    {
        $this->validate();

        if ($this->avatar) {
            $imageName = 'avatar_' . Str::random(5) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('file/avatar', $imageName, 'public');
            $oldFile = Auth::user()->avatar;
            if ($oldFile && $oldFile !== User::AVATAR) {
                Storage::disk('public')->delete('file/avatar/' . $oldFile);
            }
        }

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'province_id' => $this->provinceId,
            'regency_id' => $this->regencyId,
            'district_id' => $this->districtId,
            'village_id' => $this->villageId,
            'zip_code' => $this->zip_code,
            'avatar' => $imageName ?? Auth::user()->avatar,
        ];

        User::where('id', Auth::user()->id)->update($data);

        $this->alert('success', 'Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Oke',
            'text' => 'Update data successfully',
        ]);
        $this->reset('avatar');
    }

    public function render()
    {
        $dataProfile = User::where('id', Auth::user()->id)
            ->where(function ($query) {
                $query->whereNull('phone_number')
                    ->orWhereNull('address')
                    ->orWhereNull('province_id');
            })
            ->first();

        $completeProfile = true;
        if ($dataProfile) {
            $completeProfile = false;
        }


        return view('livewire.pages.profile', [
            'isComplete' => $completeProfile,
            'provinces' => Province::all(),
            'selectedProvince' =>  Province::find($this->provinceId),
            'regencies' =>  Regency::where('province_id', $this->provinceId)->get(),
            'selectedRegency' =>  Regency::find($this->regencyId),
            'districts' => District::where('regency_id', $this->regencyId)->get(),
            'selectedDistrict' => District::find($this->districtId),
            'villages' => Village::where('district_id', $this->districtId)->get(),
        ]);
    }
}
