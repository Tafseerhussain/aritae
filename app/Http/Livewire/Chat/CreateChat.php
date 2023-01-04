<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use Livewire\Component;
use App\Models\User;
use App\Models\Coach;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use Auth;

class CreateChat extends Component
{
    public $coach;
    public $coaches;
    public $users;
    public $message = 'Hi';
    public $receiver_id = 0;

    protected $listeners = ['conversationStarted' => '$refresh'];

    public function mount($coach_id)
    {
        
    }

    public function openMessageModal($receiver_id){
        $this->receiver_id = $receiver_id;
        \Log::error($this->coaches);

        $this->dispatchBrowserEvent('openNewMessageModal');
    }

    public function startChat()
    {
        // dd($id);
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $this->receiver_id)
                                            ->orWhere('receiver_id', $this->receiver_id)->where('sender_id', auth()->user()->id)->get();

        if (count($checkedConversation) == 0) {
            
            if(Auth::user()->user_type_id == 2){
                $createConversation = Conversation::create([
                    'receiver_id' => $this->receiver_id,
                    'sender_id' => auth()->user()->id,
                    'last_time_message' => now(),
                ]);
            }
            else if(Auth::user()->user_type_id == 3){
                $createConversation = Conversation::create([
                    'sender_id' => $this->receiver_id,
                    'receiver_id' => auth()->user()->id,
                    'last_time_message' => now(),
                ]);
            }

            $createMessage = Message::create([
                'conversation_id' => $createConversation->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->receiver_id,
                'body' => $this->message,
            ]);
            $createConversation->last_time_message = $createMessage->created_at;
            $createConversation->save();

            broadcast(new MessageSent(
                Auth()->user(),
                $createMessage,
                $createConversation,
                User::find($this->receiver_id),
            ));

            $this->dispatchBrowserEvent('hideNewMessageModal');

            $this->emit('conversationStarted');
            //dd('saved');

        } else {
            
            //dd('already conversing');

        }
    }

    public function render()
    {
        if(Auth::user()->user_type_id == 2)
            $this->coach = Auth::user()->coach->players;
        
        else if(Auth::user()->user_type_id == 3){
            $coach_array = array();
            $coach_ids = array();
            $parent = Auth::user()->parent;
            foreach($parent->players as $player){
                foreach($player->coaches as $coach){
                    if(!in_array($coach->id, $coach_ids)){
                        array_push($coach_array, $coach);
                        array_push($coach_ids, $coach->id);
                    }
                }
            }
            $this->coaches = collect($coach_array);
        }

        $this->users = (isset($this->coach)) ? $this->coach : $this->coaches;
        
        return view('livewire.chat.create-chat', [
            'users' => $this->users,
        ]);
    }
}
