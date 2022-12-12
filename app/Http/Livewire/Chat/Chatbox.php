<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use Livewire\Component;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;
use Auth;
use Log;
class Chatbox extends Component
{
    public $selectConversation;
    public $receiverInstance;
    public $messages;
    public $paginateVar = 10;
    public $height;

    // protected $listeners = ['loadConversation', 'pushMessage', 'loadMore', 'updateHeight'];

    public function getListeners()
    {
        $auth_id = Auth::user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent"=>'broadcastMessageReceived',
            'loadConversation', 'pushMessage', 'loadMore', 'updateHeight',
        ];
    }

    public function broadcastMessageReceived($event)
    {
        //Log::error($event);
        // dd($event);
        $broadcastMessage = Message::find($event['message']);

        if ($this->selectConversation) {
            if ((int) $this->selectConversation->id === (int)$event['conversation_id']) {
                $broadcastMessage->read = 1;
                $broadcastMessage->save();
            }
        }
        $this->pushMessage($event['message']);
    }

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
