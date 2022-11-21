<?php

namespace App\Http\Livewire\Coach\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Coach;
use Auth;
use Livewire\WithFileUploads;

class PersonalInformation extends Component
{
    use WithFileUploads;

    public $profileImagePreview;
    public $coverImagePreview;
    public $firstName;
    public $lastName;
    public $dateOfBirth;
    public $phoneNumber;
    public $address;
    public $city;
    public $zipCode;
    public $country;
    public $about;

    public $profileImage;
    public $coverImage;

    public function mount()
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->first();
        $this->firstName = $user->first_name;
        $this->lastName = $user->last_name;
        $this->dateOfBirth = $coach->date_of_birth;
        $this->phoneNumber = $coach->phone;
        $this->address = $coach->location;
        $this->city = $coach->city;
        $this->zipCode = $coach->zip;
        $this->country = $coach->country;
        $this->about = $coach->about;
    }

    public function submit()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'dateOfBirth' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipCode' => 'required',
            'country' => 'required'
        ]);

        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->first();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $coach->name = $this->firstName." ".$this->lastName;
        $coach->date_of_birth = $this->dateOfBirth;
        $user->address = $this->address;
        $user->city = $this->city;
        $user->zip = $this->zipCode;
        $user->country = $this->country;
        $coach->location = $this->address;
        $coach->city = $this->city;
        $coach->zip = $this->zipCode;
        $coach->country = $this->country;

        if ($this->phoneNumber != '') {
            $coach->phone = $this->phoneNumber;
        }
        if ($this->about != '') {
            $coach->about = $this->about;
        }

        $coach->save();
        $user->save();

        session()->flash('success_message', 'Your Information has been updated.');
    }

    public function submitProfileImage()
    {
        $this->validate([
            'profileImage' => 'required|image|max:2048', // 2MB Max
        ]);

        $user = Auth::user();
        $coach = Coach::where('id', $user->id)->first();
        $extension = $this->profileImage->getClientOriginalExtension();
        $img = $this->profileImage->storeAs('coaches', 'profile-'.$user->id.'.'.$extension , 'public');
        $imgUrl = 'storage/'.$img;
        $coach->profile_img = $imgUrl;
        $coach->save();

        $this->reset();
        session()->flash('success_message', 'Profile Image Updated.');
    }

    public function submitCoverImage()
    {
        $this->validate([
            'coverImage' => 'required|image|max:2048', // 2MB Max
        ]);

        $user = Auth::user();
        $coach = Coach::where('id', $user->id)->first();
        $extension = $this->coverImage->getClientOriginalExtension();
        $img = $this->coverImage->storeAs('coaches', 'cover-'.$user->id.'.'.$extension , 'public');
        $imgUrl = 'storage/'.$img;
        $coach->cover_img = $imgUrl;
        $coach->save();

        $this->reset();
        session()->flash('success_message', 'Cover Image Updated.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        $coach = Coach::where('user_id', Auth::user()->id)->first();
        $this->profileImagePreview = $coach->profile_img;
        $this->coverImagePreview = $coach->cover_img;
        return view('livewire.coach.profile.personal-information');
    }
}
