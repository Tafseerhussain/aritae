<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Sport;

class Sports extends Component
{
    public $sports;
    public $new_name;
    public $new_category = "sport";
    public $edit_name;
    public $edit_category;
    public $edit_id;
    public $delete_id;

    public function mount()
    {
        $this->sports = Sport::all();
    }

    public function createNewSport(){
        $validatedData = $this->validate([
            'new_name' => 'required|min:2',
            'new_category' => 'required|min:2',
        ]);

        $sport = Sport::create([
            "name" => $this->new_name,
            "category" => $this->new_category,
        ]);

        $this->sports = Sport::all();

        $this->dispatchBrowserEvent('hideCreateModal');
    }

    public function deleteSportConfirm($id){
        $sport = Sport::find($id);
        if($sport){
            $this->delete_id = $sport->id;

            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function deleteSport(){
        $sport = Sport::find($this->delete_id);
        if($sport){
            $sport->delete();

            $this->sports = Sport::all();

            $this->dispatchBrowserEvent('hideDeleteModal');
        }
    }

    public function openEditSport($id){
        $sport = Sport::find($id);
        if($sport){
            $this->edit_name = $sport->name;
            $this->edit_category = $sport->category;
            $this->edit_id = $id;

            $this->dispatchBrowserEvent('openEditModal');
        }
    }

    public function saveSport(){
        $validatedData = $this->validate([
            'edit_name' => 'required|min:2',
            'edit_category' => 'required|min:2',
            'edit_id' => 'required',
        ]);

        $sport = Sport::find($this->edit_id);
        if($sport){
            $sport->name = $this->edit_name;
            $sport->category = $this->edit_category;
            $sport->save();

            $this->sports = Sport::all();

            $this->dispatchBrowserEvent('hideEditModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.sports');
    }
}
