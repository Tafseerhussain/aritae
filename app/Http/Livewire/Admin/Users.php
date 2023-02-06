<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserType;
use App\Models\Sport;

class Users extends Component
{
    use WithPagination;

    public $sports;
    public $user_types;
    public $users;

    public $per_page = 6;
    public $current_page = 1;
    public $total_user;
    public $total_page;
    public $search = '';
    public $sport = 'Sport';
    public $status = 'All';
    public $type = 'All';

    public function mount(){
        $this->sports = Sport::all();
        $this->user_types = UserType::all();
        $this->users = User::where('user_type_id', '!=', 1)->limit($this->per_page)->get();
        $this->total_user = User::where('user_type_id', '!=', 1)->count();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    public function search(){
        
    }

    public function changePage($page){
        $this->current_page = $page;
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadUsers();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    public function sportFilter($sport){
        $this->sport = $sport;
        $this->reloadUsers();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    public function statusFilter($status){
        $this->status = $status;
        $this->reloadUsers();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    public function typeFilter($type){
        $this->type = $type;
        $this->reloadUsers();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    private function reloadUsers(){
        if($this->sport == 'Sport'){
            if($this->status == 'All'){
                if($this->type == 'All'){
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', '!=', 1)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', '!=', 1)->count();
                }
                else{
                    $type_code = 2;
                    if($this->type == 'Coach') $type_code = 2;
                    else if($this->type == 'Parent') $type_code = 3;
                    else $type_code = 4;
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', $type_code)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', $type_code)->count();
                }
            }
            else{
                $status = $this->status == 'Active' ? 'active' : 'suspended';

                if($this->type == 'All'){
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', '!=', 1)->where('status', $status)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', '!=', 1)->where('status', $status)->count();
                }
                else{
                    $type_code = 2;
                    if($this->type == 'Coach') $type_code = 2;
                    else if($this->type == 'Parent') $type_code = 3;
                    else $type_code = 4;
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', $type_code)->where('status', $status)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', $type_code)->where('status', $status)->count();
                }
            }
        }
        else{
            if($this->status == 'All'){
                if($this->type == 'All'){
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', '!=', 1)->where('area_of_focus', $this->sport)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', '!=', 1)->where('area_of_focus', $this->sport)->count();
                }
                else{
                    $type_code = 2;
                    if($this->type == 'Coach') $type_code = 2;
                    else if($this->type == 'Parent') $type_code = 3;
                    else $type_code = 4;
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', $type_code)->where('area_of_focus', $this->sport)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', $type_code)->where('area_of_focus', $this->sport)->count();
                }
            }
            else{
                $status = $this->status == 'Active' ? 'active' : 'suspended';

                if($this->type == 'All'){
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', '!=', 1)->where('status', $status)->where('area_of_focus', $this->sport)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', '!=', 1)->where('status', $status)->where('area_of_focus', $this->sport)->count();
                }
                else{
                    $type_code = 2;
                    if($this->type == 'Coach') $type_code = 2;
                    else if($this->type == 'Parent') $type_code = 3;
                    else $type_code = 4;
                    $start = ($this->current_page - 1) * $this->per_page;

                    $this->users = User::where('user_type_id', $type_code)->where('status', $status)->where('area_of_focus', $this->sport)->offset($start)->limit($this->per_page)->get();
                    $this->total_user = User::where('user_type_id', $type_code)->where('status', $status)->where('area_of_focus', $this->sport)->count();
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.users');
    }
}
