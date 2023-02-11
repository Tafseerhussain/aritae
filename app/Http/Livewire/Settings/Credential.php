<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Auth;
use Hash;

class Credential extends Component
{

    public $email;
    public $user_id;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount(){
        $this->user_id = Auth::id();
        $this->email = Auth::user()->email;
    }

    public function saveCredential(){
        $this->validate([
            'email' => ['required', 'unique:users,email,'.$this->user_id],
            'currentPassword' => ['required'],
            'newPassword' => ['nullable', 'same:confirmPassword', 'min:9'],
            'confirmPassword' => ['nullable', 'required_with:newPassword', 'min:9'],
        ]);

        if(Hash::check($this->currentPassword, Auth::user()->password)){
            $user = Auth::user();

            if($this->newPassword){
                $password = Hash::make($this->newPassword);

                $user->password = $password;
                $user->save();

                $this->dispatchBrowserEvent('notify', array(
                    'type' => 'info',
                    'title' => 'Password updated',
                    'message' => 'Password updated successfully.',
                ));
            }
            
            if($user->email != $this->email){
                $user->email = $this->email;
                $user->save();

                $this->dispatchBrowserEvent('notify', array(
                    'type' => 'info',
                    'title' => 'Email updated',
                    'message' => 'Email updated successfully.',
                ));
            }
        }
        else{
            $this->dispatchBrowserEvent('notify', array(
                'type' => 'error',
                'title' => 'Invalid current password',
                'message' => 'Current password is not matching.',
            ));
        }

        $this->emit('back');
    }

    public function cancel(){
        $this->emit('back');
    }

    public function render()
    {
        return view('livewire.settings.credential');
    }
}
