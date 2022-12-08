<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat\Conversation;
use App\Models\User;
use App\Models\Player;

class ChatList extends Component
{
    public $userType;
    public $conversations;
    public $receiverInstance;

    public $selectConversation;

    protected $listeners = ['chatUserSelected', 'refresh' => '$refresh'];

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
        } else if (auth()->user()->user_type_id == 2) {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        }
        return $this->receiverInstance;
    }

    public function mount()
    {
        if (auth()->user()->user_type_id == 4) {
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
