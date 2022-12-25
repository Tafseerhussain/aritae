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

    public $profileScore = 0;

    protected $listeners = ['shouldUpdateScore' => 'updateProfileScore'];

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

        $this->profileScore = $this->profileCompleteness();
    }

    public function updateProfileScore(){
        $this->profileScore = $this->profileCompleteness();
    }

    private function profileCompleteness(){
        $score = 0;

        //Personal information - possible score 30, 3 for each
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->with('experiences', 'certificates', 'educations')->first();

        if(isset($user->first_name))
            $score += 3;
        if(isset($user->last_name))
            $score += 3;
        if(isset($coach->date_of_birth))
            $score += 3;
        if(isset($coach->phone))
            $score += 3;
        if(isset($coach->location))
            $score += 3;
        if(isset($coach->city))
            $score += 3;
        if(isset($coach->zip))
            $score += 3;
        if(isset($coach->country))
            $score += 3;
        if(isset($coach->about))
            $score += 3;
        if(isset($coach->profile_img))
            $score += 3;

        //Hourly Rate section, possible score 10
        if(isset($coach->hourly_rate) && $coach->hourly_rate > 0)
            $score += 10;
        
        //Coaching Experiences, possible score 20
        if($coach->experiences()->exists())
            $score += 20;
        
        //Certificates, possible score 20
        if($coach->certificates()->exists())
            $score += 20;
        
        //Educations, possible score 20
        if($coach->educations()->exists())
            $score += 20;

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
        $coach = Coach::where('user_id', $user->id)->first();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->full_name = $this->firstName." ".$this->lastName;
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
        $coach = Coach::where('user_id', $user->id)->first();
        if (\File::exists($coach->profile_img)) {
            \File::delete($coach->profile_img);
        }
        $extension = $this->profileImage->getClientOriginalExtension();
        $imageName = md5($this->profileImage . microtime()).'.'.$this->profileImage->extension();
        $img = $this->profileImage->storeAs('coaches', $imageName, 'public');
        $imgUrl = 'storage/'.$img;
        $coach->profile_img = $imgUrl;
        $coach->save();

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
        $coach = Coach::where('user_id', $user->id)->first();
        if (\File::exists($coach->cover_img)) {
            \File::delete($coach->cover_img);
        }
        $extension = $this->coverImage->getClientOriginalExtension();
        $imageName = md5($this->coverImage . microtime()).'.'.$this->coverImage->extension();
        $img = $this->coverImage->storeAs('coaches', $imageName , 'public');
        $imgUrl = 'storage/'.$img;
        $coach->cover_img = $imgUrl;
        $coach->save();

        $this->coverImage = null;
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
