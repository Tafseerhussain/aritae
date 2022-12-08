<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;

class Chatbox extends Component
{
    public $selectConversation;
    public $receiverInstance;
    public $paginateVar = 10;
    public $height;

    protected $listeners = ['loadConversation', 'pushMessage', 'loadMore', 'updateHeight'];

    public function loadConversation(Conversation $conversation, User $receiver)
    {
        // dd($conversation, $receiver);
        $this->selectConversation = $conversation;
        $this->receiverInstance = $receiver;

        $this->messages_count = Message::where('conversation_id', $this->selectConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectConversation->id)
                                 ->skip($this->messages_count - $this->paginateVar)
                                 ->take($this->paginateVar)->get();

        $this->dispatchBrowserEvent('chatUserSelected');
    }

    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
        $this->dispatchBrowserEvent('chatUserSelected');
    }

    public function loadMore()
    {
        $this->paginateVar += 10;
        $this->messages_count = Message::where('conversation_id', $this->selectConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectConversation->id)
                                 ->skip($this->messages_count - $this->paginateVar)
                                 ->take($this->paginateVar)->get();

        $height = $this->height;
        $this->dispatchBrowserEvent('updatedHeight', ($height));
    }

    public function updateHeight($height)
    {
        $this->height = $height;

    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
