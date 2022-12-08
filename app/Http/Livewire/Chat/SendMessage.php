<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;

class SendMessage extends Component
{
    public $selectConversation;
    public $receiverInstance;
    public $body;

    protected $listeners = ['updateSendMessage'];

    public function updateSendMessage(Conversation $conversation, User $receiver)
    {
        $this->selectConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }
        $createMessage = Message::create([
            'conversation_id' => $this->selectConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);
        $this->selectConversation->last_time_message = $createMessage->created_at;
        $this->selectConversation->save();

        $this->emitTo('chat.chatbox', 'pushMessage', $createMessage->id);
        $this->emitTo('chat.chat-list', 'refresh');
        $this->reset('body');
        $this->dispatchBrowserEvent('chatUserSelected');
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
