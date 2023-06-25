<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactResponse;

class ContactForm extends Component
{
    use WithPagination;

    public $responses;

    public $per_page = 6;
    public $current_page = 1;
    public $total_response;
    public $total_page;
    public $search = '';

    public function mount(){
        $this->responses = ContactResponse::limit($this->per_page)->get();
        $this->total_response = ContactResponse::count();
        $this->total_page = ceil($this->total_response / $this->per_page);
    }

    public function search($search_key){
        $this->search = $search_key;
        $this->reloadResponses();
        $this->total_page = ceil($this->total_response / $this->per_page);
    }

    public function changePage($page){
        $this->current_page = $page;
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadResponses();
        $this->total_page = ceil($this->total_response / $this->per_page);
    }

    private function reloadResponses(){
                if($this->search == ''){
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->responses = ContactResponse::offset($start)->limit($this->per_page)->get();
                    $this->total_response = ContactResponse::count();
                }
                else{
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->responses = ContactResponse::where('email', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('first_name', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('last_name', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('message', 'LIKE', '%'.$this->search.'%')
                        ->offset($start)->limit($this->per_page)->get();
                    
                    if($this->responses)
                        $this->total_response = count($this->responses);
                    else
                        $this->total_response = 0;
                }
    }

    public function render()
    {
        return view('livewire.admin.contact-form');
    }
}
