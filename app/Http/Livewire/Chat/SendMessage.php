<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class SendMessage extends Component
{
    public $selectConversation;
    public $createMessage;
    public $receiverInstance;
    public $body;

    protected $listeners = ['updateSendMessage', 'dispatchMessageSent'];

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
        $this->createMessage = Message::create([
            'conversation_id' => $this->selectConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);
        $this->selectConversation->last_time_message = $this->createMessage->created_at;
        $this->selectConversation->save();

        $this->emitTo('chat.chatbox', 'pushMessage', $this->createMessage->id);
        $this->emitTo('chat.chat-list', 'refresh');
        $this->reset('body');
        $this->dispatchBrowserEvent('chatUserSelected');

        $this->emitSelf('dispatchMessageSent');
    }

    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(
            Auth()->user(),
            $this->createMessage,
            $this->selectConversation,
            $this->receiverInstance
        ));
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
