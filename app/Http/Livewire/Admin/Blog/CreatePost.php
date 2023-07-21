<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BlogCategory;
use App\Models\BlogArticle;

class CreatePost extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'removeImage',
    ];

    public $title = '';
    public $subtitle = '';
    public $introduction = '';
    public $category = '';
    public $thumbnail = null;
    public $thumbnail_url = '';
    public $more_imgs = null;
    public $more_img_urls = [];
    public $quote = '';
    public $quote_by = '';
    public $long_text = '';
    public $foot_note = '';

    public function mount(){
        $this->categories = BlogCategory::all();
    }
    
    public function back(){
        $this->emit('back');
    }

    public function updatedThumbnail(){
        $this->validate([
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
        ]);

        $thumbName = time().'_'.str_replace(' ', '_', $this->thumbnail->getClientOriginalName());     
        $this->thumbnail->storeAs('public/images/blog', $thumbName);
        $this->thumbnail_url = 'storage/images/blog/'.$thumbName;

        $this->dispatchBrowserEvent('update_thumbnail', ['thumb_url' => $this->thumbnail_url]);
    }

    public function updatedMoreImgs(){
        $this->validate([
            'more_imgs' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
        ]);

        $imageName = time().'_'.str_replace(' ', '_', $this->more_imgs->getClientOriginalName());     
        $this->more_imgs->storeAs('public/images/blog', $imageName);
        array_push($this->more_img_urls, 'storage/images/blog/'.$imageName);

        $this->dispatchBrowserEvent('update_more_imgs', ['more_img_urls' => $this->more_img_urls]);
    }

    public function removeImage($index){
        unset($this->more_img_urls[$index]);
        $this->more_img_urls = array_values($this->more_img_urls);
        $this->dispatchBrowserEvent('update_more_imgs', ['more_img_urls' => $this->more_img_urls]);
    }

    public function createPost(){
        $this->validate([
            'title' => ['required', 'min:5'],
            'subtitle' => ['required', 'min:5'],
            'introduction' => ['required', 'min:5'],
            'category' => ['required', 'exists:blog_categories,id'],
            'long_text' => ['required', 'min:10'],
        ]);

        $article = BlogArticle::create([
            'img' => $this->thumbnail_url,
            'blog_category_id' => $this->category,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'introduction' => $this->introduction,
            'more_imgs' => json_encode($this->more_img_urls),
            'quote' => $this->quote,
            'quote_by' => $this->quote_by,
            'long_text' => $this->long_text,
            'foot_note' => $this->foot_note,
        ]);

        $this->emit('back');
        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Post created',
            'message' => 'Blog post created successfully',
        ));  
    }

    public function render()
    {
        return view('livewire.admin.blog.create-post');
    }
}
