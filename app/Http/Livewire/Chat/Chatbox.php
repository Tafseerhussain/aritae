<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Events\MessageRead;
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


    // ==============================================================================================
    // LISTENERS
    // ==============================================================================================
    // protected $listeners = ['loadConversation', 'pushMessage', 'loadMore', 'updateHeight'];
    public function getListeners()
    {
        $auth_id = Auth::user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent"=>'broadcastMessageReceived',
            "echo-private:chat.{$auth_id},MessageRead"=>'broadcastMessageRead',
            'loadConversation', 'pushMessage', 'loadMore', 'updateHeight', 'broadcastedMessageRead',
        ];
    }

    // ==============================================================================================
    // BROADCASTS
    // ==============================================================================================
    public function broadcastMessageReceived($event)
    {
        $this->emitTo('chat.chat-list', 'refresh');
        $broadcastMessage = Message::find($event['message']);

        if ($this->selectConversation) {
            if ((int) $this->selectConversation->id === (int)$event['conversation_id']) {
                $broadcastMessage->read = 1;
                $broadcastMessage->save();
            }
            $this->pushMessage($event['message']);
            $this->emitSelf('broadcastedMessageRead');
        }
    }

    public function broadcastMessageRead($event)
    {
        if ($this->selectConversation) {
            if ((int) $this->selectConversation->id === (int)$event['conversation_id']) {
                $this->dispatchBrowserEvent('markMessageAsRead');
            }
        }
    }

    public function broadcastedMessageRead()
    {
        broadcast(new MessageRead($this->selectConversation->id, $this->receiverInstance->id));
    }

    // ==============================================================================================
    // COMPONENT FUNCTIONS
    // ==============================================================================================
    public function loadConversation(Conversation $conversation, User $receiver)
    {
        $this->selectConversation = $conversation;
        $this->receiverInstance = $receiver;

        $this->messages_count = Message::where('conversation_id', $this->selectConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectConversation->id)
                                 ->skip($this->messages_count - $this->paginateVar)
                                 ->take($this->paginateVar)->get();

        $this->dispatchBrowserEvent('chatUserSelected');

        Message::where('conversation_id', $this->selectConversation->id)
               ->where('receiver_id', Auth::user()->id)
               ->update(['read' => 1]);

        $this->emitSelf('broadcastedMessageRead');
        $this->emitTo('chat.chat-list', 'refresh');
    }

    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
        $this->dispatchBrowserEvent('chatUserSelected');
    }

    public function loadMore()
    {
        $this->paginateVar = $this->paginateVar + 10;
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
