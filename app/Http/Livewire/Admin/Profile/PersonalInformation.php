<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Admin;
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
        $admin = Admin::where('user_id', $user->id)->first();
        $this->firstName = $user->first_name;
        $this->lastName = $user->last_name;
        $this->dateOfBirth = $admin->date_of_birth;
        $this->phoneNumber = $admin->phone;
        $this->address = $admin->location;
        $this->city = $admin->city;
        $this->zipCode = $admin->zip;
        $this->country = $admin->country;
        $this->about = $admin->about;

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
        $admin = Admin::where('user_id', $user->id)->first();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->full_name = $this->firstName." ".$this->lastName;
        $admin->name = $this->firstName." ".$this->lastName;
        $admin->date_of_birth = $this->dateOfBirth;
        $user->address = $this->address;
        $user->city = $this->city;
        $user->zip = $this->zipCode;
        $user->country = $this->country;
        $admin->location = $this->address;
        $admin->city = $this->city;
        $admin->zip = $this->zipCode;
        $admin->country = $this->country;

        if ($this->phoneNumber != '') {
            $admin->phone = $this->phoneNumber;
        }
        if ($this->about != '') {
            $admin->about = $this->about;
        }

        $admin->save();
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
        $admin = Admin::where('user_id', $user->id)->first();
        if (\File::exists($admin->profile_img)) {
            \File::delete($admin->profile_img);
        }
        $extension = $this->profileImage->getClientOriginalExtension();
        $imageName = md5($this->profileImage . microtime()).'.'.$this->profileImage->extension();
        $img = $this->profileImage->storeAs('admins', $imageName, 'public');
        $imgUrl = 'storage/'.$img;
        $admin->profile_img = $imgUrl;
        $admin->save();

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
        $admin = Admin::where('user_id', $user->id)->first();
        if (\File::exists($admin->cover_img)) {
            \File::delete($admin->cover_img);
        }
        $extension = $this->coverImage->getClientOriginalExtension();
        $imageName = md5($this->coverImage . microtime()).'.'.$this->coverImage->extension();
        $img = $this->coverImage->storeAs('admins', $imageName , 'public');
        $imgUrl = 'storage/'.$img;
        $admin->cover_img = $imgUrl;
        $admin->save();

        $this->coverImage = null;
        session()->flash('success_message', 'Cover Image Updated.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        $admin = Admin::where('user_id', Auth::user()->id)->first();
        $this->profileImagePreview = $admin->profile_img;
        $this->coverImagePreview = $admin->cover_img;
        return view('livewire.admin.profile.personal-information');
    }
}
