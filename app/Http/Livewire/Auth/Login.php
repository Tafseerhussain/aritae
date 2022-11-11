<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;

    public function submit()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', "You are Login successful. Redirecting...");
                return redirect()->route('home');
        }else{
            session()->flash('error', 'Email/Password combination not found.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
