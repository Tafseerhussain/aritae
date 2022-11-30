<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

use App\Models\User;
use App\Models\Sport;
use App\Models\Coach;
use App\Models\Player;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Registration extends Component
{
    public $step = 1;

    public $sports;

    public $firstName = '';
    public $lastName;
    public $email;
    public $password;
    public $confirmPassword;
    public $areaOfFocus = '';
    public $gender = 'male';

    public function mount()
    {
        $this->sports = Sport::all();
        $this->areaOfFocus = $this->sports[0]['id'];
    }

    public function changeStep($step)
    {
        $this->step = $step;
    }

    public function submitPlayer()
    {
        $validatedDate = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword|min:9',
            'confirmPassword' => 'required',
            'areaOfFocus' => 'required',
            'gender' => 'required',
        ]);

        $user = new User;
        $user->user_type_id = $this->step;
        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->full_name = $this->firstName.' '.$this->lastName;
        $user->email = $this->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($this->password);
        $user->area_of_focus = $this->sports[$this->areaOfFocus]['name'];
        $user->gender = $this->gender;
        $user->experience = 0;
        $user->hourly_rate = 0;
        $user->remember_token = Str::random(10);
        $user->save();
        
        $sport = Sport::find($this->areaOfFocus);
        $sport->users()->attach($user);

        if ($this->step == 2) {

            $coach = new Coach;
            $coach->user_id = $user->id;
            $coach->name = $user->full_name;
            $coach->gender = $user->gender;
            $coach->sport = $user->area_of_focus;
            $coach->save();  

        } elseif ($this->step == 4) {

            $player = new Player;
            $player->user_id = $user->id;
            $player->name = $user->full_name;
            $player->gender = $user->gender;
            $player->sport = $user->area_of_focus;
            $player->save();  

        }
          
        return redirect()->route('login')->with('registered', 'Thank you for joining Aritae . You can Login to your account now.');

    }

    public function render()
    {
        return view('livewire.auth.registration');
    }
}
