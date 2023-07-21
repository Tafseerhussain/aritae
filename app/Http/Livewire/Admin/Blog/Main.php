<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
        'createPost',
        'editPost',
        'back',
    ];

    public $active_component = '';
    public $post_id = null;

    public function mount(){
        $this->active_component = 'blogs';
    }
    public function createPost(){
        $this->active_component = 'create_post';
    }

    public function back(){
        $this->active_component = 'blogs';
        //$this->redirect(route('admin.blog'));
    }

    public function editPost($post_id){
        $this->post_id = $post_id;
        $this->active_component = 'edit_post';
    }

    public function render()
    {
        return view('livewire.admin.blog.main');
    }
}
