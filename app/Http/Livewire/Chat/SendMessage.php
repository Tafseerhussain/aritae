<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use URL;


class SendMessage extends Component
{
    use WithFileUploads;

    public $selectConversation;
    public $createMessage;
    public $receiverInstance;
    public $body;
    public $image;
    public $document;

    protected $listeners = ['updateSendMessage', 'dispatchMessageSent',
            'upload:finished' => 'fileUploadFinished',
        ];

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

    public function fileUploadFinished($file){
        if($file == 'image'){
            $this->validate([
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            $imageName = time().'_'.str_replace(' ', '_', $this->image->getClientOriginalName());     
            $this->image->storeAs('public/images/attachment', $imageName);
            $this->body = URL::asset('storage/images/attachment/'.$imageName);
            
            $this->sendMessage();
        }
        if($file == 'document'){
            $this->validate([
                'document' => ['required', 'mimes:pdf,doc,docx,txt,xls,xlsx,ppt,pptx', 'max:25600']
            ]);

            $documentName = time().'_'.str_replace(' ', '_', $this->document->getClientOriginalName());     
            $this->document->storeAs('public/documents/attachment', $documentName);
            $this->body = URL::asset('storage/documents/attachment/'.$documentName);
            
            $this->sendMessage();
        }
    }


    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
