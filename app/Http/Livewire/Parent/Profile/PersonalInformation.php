<?php

namespace App\Http\Livewire\Parent\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\PlayerParent;
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

    public $profileScore = 0;

    protected $listeners = ['shouldUpdateScore' => 'updateProfileScore'];

    public function mount()
    {
        $user = Auth::user();
        $parent = PlayerParent::where('user_id', $user->id)->first();
        $this->firstName = $user->first_name;
        $this->lastName = $user->last_name;
        $this->dateOfBirth = $parent->date_of_birth;
        $this->phoneNumber = $parent->phone;
        $this->address = $parent->location;
        $this->city = $parent->city;
        $this->zipCode = $parent->zip;
        $this->country = $parent->country;
        $this->about = $parent->about;

        $this->profileScore = $this->profileCompleteness();
    }

    public function updateProfileScore(){
        $this->profileScore = $this->profileCompleteness();
    }

    private function profileCompleteness(){
        $score = 0;

        return $score;
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
        $parent = PlayerParent::where('user_id', $user->id)->first();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->full_name = $this->firstName." ".$this->lastName;
        $parent->name = $this->firstName." ".$this->lastName;
        $parent->date_of_birth = $this->dateOfBirth;
        $user->address = $this->address;
        $user->city = $this->city;
        $user->zip = $this->zipCode;
        $user->country = $this->country;
        $parent->location = $this->address;
        $parent->city = $this->city;
        $parent->zip = $this->zipCode;
        $parent->country = $this->country;

        if ($this->phoneNumber != '') {
            $parent->phone = $this->phoneNumber;
        }
        if ($this->about != '') {
            $parent->about = $this->about;
        }

        $parent->save();
        $user->save();

        //Emit score update
        $this->emit('shouldUpdateScore');

        session()->flash('success_message', 'Your Information has been updated.');
    }

    public function submitProfileImage()
    {
        $this->validate([
            'profileImage' => 'required|image|max:2048', // 2MB Max
        ]);

        $user = Auth::user();
        $parent = PlayerParent::where('user_id', $user->id)->first();
        if (\File::exists($parent->profile_img)) {
            \File::delete($parent->profile_img);
        }
        $extension = $this->profileImage->getClientOriginalExtension();
        $imageName = md5($this->profileImage . microtime()).'.'.$this->profileImage->extension();
        $img = $this->profileImage->storeAs('parents', $imageName, 'public');
        $imgUrl = 'storage/'.$img;
        $parent->profile_img = $imgUrl;
        $parent->save();

        //Emit score update
        $this->emit('shouldUpdateScore');

        $this->profileImage = null;
        session()->flash('success_message', 'Profile Image Updated.');
    }

    public function submitCoverImage()
    {
        $this->validate([
            'coverImage' => 'required|image|max:2048', // 2MB Max
        ]);

        $user = Auth::user();
        $parent = PlayerParent::where('user_id', $user->id)->first();
        if (\File::exists($parent->cover_img)) {
            \File::delete($parent->cover_img);
        }
        $extension = $this->coverImage->getClientOriginalExtension();
        $imageName = md5($this->coverImage . microtime()).'.'.$this->coverImage->extension();
        $img = $this->coverImage->storeAs('parents', $imageName , 'public');
        $imgUrl = 'storage/'.$img;
        $parent->cover_img = $imgUrl;
        $parent->save();

        $this->coverImage = null;
        session()->flash('success_message', 'Cover Image Updated.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        $parent = PlayerParent::where('user_id', Auth::user()->id)->first();
        $this->profileImagePreview = $parent->profile_img;
        $this->coverImagePreview = $parent->cover_img;
        return view('livewire.parent.profile.personal-information');
    }
}
