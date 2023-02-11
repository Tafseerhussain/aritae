<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\UserSetting;
use Auth;

class Main extends Component
{
    protected $listeners = [
        'back' => 'backToMain',
    ];

    public $settings;
    public $activeComponent = 'main';

    public $sendUpdateEmail;
    public $sendUpdatePush;
    public $sendUpdateCommunity;
    public $sendUpdateEvent;
    public $sendInspirationalEmail;

    public function mount(){
        $this->settings = Auth::user()->settings;
        if(!$this->settings){
            $this->settings = UserSetting::create([
                'user_id' => Auth::id(),
            ]);
        }

        $this->sendUpdateEmail = $this->settings->send_update_email;
        $this->sendUpdatePush = $this->settings->send_update_push;
        $this->sendUpdateCommunity = $this->settings->send_update_community;
        $this->sendUpdateEvent = $this->settings->send_update_event;
        $this->sendInspirationalEmail = $this->settings->send_inspirational_email;
    }

    public function backToMain(){
        $this->activeComponent = 'main';
    }

    public function credential(){
        $this->activeComponent = 'credential';
    }

    public function payment(){
        $this->activeComponent = 'payment';
    }

    public function saveSettings(){
        $settings = Auth::user()->settings;

        $settings->send_update_email = $this->sendUpdateEmail;
        $settings->send_update_push = $this->sendUpdatePush;
        $settings->send_update_community = $this->sendUpdateCommunity;
        $settings->send_update_event = $this->sendUpdateEvent;
        $settings->send_inspirational_email = $this->sendInspirationalEmail;

        $settings->save();

        $this->dispatchBrowserEvent('notify', [
            'title' => 'Settings updated',
            'type' => 'info',
            'message' => "Your notification and subscription preferences updated",
        ]);
    }

    public function openDeleteModal(){
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function deleteAccount(){
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.settings.main');
    }
}
