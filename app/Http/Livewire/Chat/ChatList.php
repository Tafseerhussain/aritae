<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat\Conversation;
use App\Models\User;
use App\Models\Player;
use Auth;

class ChatList extends Component
{
    public $userType;
    public $conversations;
    public $receiverInstance;
    public $present_ids = [];
    public $selectConversation;

    //protected $listeners = ['chatUserSelected', 'refresh' => '$refresh'];

    public function getListeners()
    {
        $auth_id = Auth::user()->id;
        return [
            "echo-presence:presence-call-channel,here"=>'initPresentUser',
            "echo-presence:presence-call-channel,joining"=>'addPresentUser',
            "echo-presence:presence-call-channel,leaving"=>'removePresentUser',
            'conversationStarted' => 'updateConversations',
            'chatUserSelected', 'refresh' => '$refresh',
        ];
    }

    public function initPresentUser($users){
        $present_ids = array();
        foreach($users as $user){
            array_push($this->present_ids, $user['id']);
        }

        $this->paresent_ids = array_unique($present_ids);

        $this->emit('userStatus', $this->present_ids);
    }
    public function addPresentUser($user){
        if(!in_array($user['id'], $this->present_ids))
            array_push($this->present_ids, $user['id']);

        $this->emit('userStatus', $this->present_ids);
    }
    public function removePresentUser($user){
        $exists = array_search($user['id'], $this->present_ids);
        if($exists)
            unset($this->present_ids[$exists]);
        
        $this->emit('userStatus', $this->present_ids);
    }

    public function chatUserSelected(Conversation $conversation, $receiver_id)
    {
        $this->selectConversation = $conversation;
        $receiverInstance = User::find($receiver_id);

        $this->emitTo('chat.chatbox', 'loadConversation', $this->selectConversation, $receiverInstance);
        $this->emitTo('chat.send-message', 'updateSendMessage', $this->selectConversation, $receiverInstance);
    }

    public function getChatUserInstance(Conversation $conversation)
    {
        if (auth()->user()->user_type_id == 4) {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        } else if (auth()->user()->user_type_id == 3) {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        } else if (auth()->user()->user_type_id == 2) {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        }
        return $this->receiverInstance;
    }

    public function updateConversations()
    {
        if (auth()->user()->user_type_id == 4) {
            $this->conversations = Conversation::where('receiver_id', auth()->user()->id)->orderBy('last_time_message', 'DESC')->get();
        } else if (auth()->user()->user_type_id == 3) {
            $this->conversations = Conversation::where('receiver_id', auth()->user()->id)->orderBy('last_time_message', 'DESC')->get();
        } else if (auth()->user()->user_type_id == 2) {
            $this->conversations = Conversation::where('sender_id', auth()->user()->id)->orderBy('last_time_message', 'DESC')->get();
        }
    }

    public function mount()
    {
        if (auth()->user()->user_type_id == 4) {
            $this->conversations = Conversation::where('receiver_id', auth()->user()->id)->orderBy('last_time_message', 'DESC')->get();
        } else if (auth()->user()->user_type_id == 3) {
            $this->conversations = Conversation::where('receiver_id', auth()->user()->id)->orderBy('last_time_message', 'DESC')->get();
        } else if (auth()->user()->user_type_id == 2) {
            $this->conversations = Conversation::where('sender_id', auth()->user()->id)->orderBy('last_time_message', 'DESC')->get();
        }
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
