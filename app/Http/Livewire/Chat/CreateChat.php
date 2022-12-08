<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;

class CreateChat extends Component
{
    public $coach;
    public $message = 'Hi';

    public function mount($coach_id)
    {
        $this->coach = Coach::where('user_id', $coach_id)->first();    
    }

    public function startChat($receiver_id)
    {
        // dd($id);
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $receiver_id)
                                            ->orWhere('receiver_id', $receiver_id)->where('sender_id', auth()->user()->id)->get();

        if (count($checkedConversation) == 0) {
            
            $createConversation = Conversation::create([
                'receiver_id' => $receiver_id,
                'sender_id' => auth()->user()->id,
                'last_time_message' => now(),
            ]);
            $createMessage = Message::create([
                'conversation_id' => $createConversation->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiver_id,
                'body' => $this->message,
            ]);
            $createConversation->last_time_message = $createMessage->created_at;
            $createConversation->save();

            dd('saved');

        } else {
            
            dd('already conversing');

        }
    }

    public function render()
    {
        return view('livewire.chat.create-chat', [
            'players' => $this->coach->players,
        ]);
    }
}
