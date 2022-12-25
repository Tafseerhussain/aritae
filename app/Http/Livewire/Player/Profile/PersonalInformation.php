<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Player;
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
        $player = Player::where('user_id', $user->id)->first();
        $this->firstName = $user->first_name;
        $this->lastName = $user->last_name;
        $this->dateOfBirth = $player->date_of_birth;
        $this->phoneNumber = $player->phone;
        $this->address = $player->location;
        $this->city = $player->city;
        $this->zipCode = $player->zip;
        $this->country = $player->country;
        $this->about = $player->about;

        $this->profileScore = $this->profileCompleteness();
    }

    public function updateProfileScore(){
        $this->profileScore = $this->profileCompleteness();
    }

    private function profileCompleteness(){
        $score = 0;

        //Personal information - possible score 30, 3 for each
        $user = Auth::user();
        $player = Player::where('user_id', $user->id)->with('athleticInfo', 'experiences', 'certificates', 'educations')->first();

        if(isset($user->first_name))
            $score += 3;
        if(isset($user->last_name))
            $score += 3;
        if(isset($player->date_of_birth))
            $score += 3;
        if(isset($player->phone))
            $score += 3;
        if(isset($player->location))
            $score += 3;
        if(isset($player->city))
            $score += 3;
        if(isset($player->zip))
            $score += 3;
        if(isset($player->country))
            $score += 3;
        if(isset($player->about))
            $score += 3;
        if(isset($player->profile_img))
            $score += 3;

        //Athletic Information, possible score 10, height 6, wieght 4.
        if($player->athleticInfo()->exists()){
            $info = $player->athleticInfo()->first();
            if(isset($info->height_ft) || isset($info->height_inch))
                $score += 6;
            if(isset($info->weight))
                $score += 4;
        }
        
        //Coaching Experiences, possible score 20
        if($player->experiences()->exists())
            $score += 20;
        
        //Certificates, possible score 20
        if($player->certificates()->exists())
            $score += 20;
        
        //Educations, possible score 20
        if($player->educations()->exists())
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
        $player = Player::where('user_id', $user->id)->first();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->full_name = $this->firstName." ".$this->lastName;
        $player->name = $this->firstName." ".$this->lastName;
        $player->date_of_birth = $this->dateOfBirth;
        $user->address = $this->address;
        $user->city = $this->city;
        $user->zip = $this->zipCode;
        $user->country = $this->country;
        $player->location = $this->address;
        $player->city = $this->city;
        $player->zip = $this->zipCode;
        $player->country = $this->country;

        if ($this->phoneNumber != '') {
            $player->phone = $this->phoneNumber;
        }
        if ($this->about != '') {
            $player->about = $this->about;
        }

        $player->save();
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
        $player = Player::where('user_id', $user->id)->first();
        if (\File::exists($player->profile_img)) {
            \File::delete($player->profile_img);
        }
        $extension = $this->profileImage->getClientOriginalExtension();
        $imageName = md5($this->profileImage . microtime()).'.'.$this->profileImage->extension();
        $img = $this->profileImage->storeAs('players', $imageName, 'public');
        $imgUrl = 'storage/'.$img;
        $player->profile_img = $imgUrl;
        $player->save();

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
        $player = Player::where('user_id', $user->id)->first();
        if (\File::exists($player->cover_img)) {
            \File::delete($player->cover_img);
        }
        $extension = $this->coverImage->getClientOriginalExtension();
        $imageName = md5($this->coverImage . microtime()).'.'.$this->coverImage->extension();
        $img = $this->coverImage->storeAs('players', $imageName , 'public');
        $imgUrl = 'storage/'.$img;
        $player->cover_img = $imgUrl;
        $player->save();

        $this->coverImage = null;
        session()->flash('success_message', 'Cover Image Updated.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        $player = Player::where('user_id', Auth::user()->id)->first();
        $this->profileImagePreview = $player->profile_img;
        $this->coverImagePreview = $player->cover_img;
        return view('livewire.player.profile.personal-information');
    }
}
