<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BlogCategory;
use App\Models\BlogArticle;

class Blogs extends Component
{
    use WithPagination;

    public $blog_categories;
    public $blog_articles;

    public $per_page = 6;
    public $current_page = 1;
    public $total_article;
    public $total_page;
    public $search = '';
    public $category = 'all';
    public $delete_id = null;

    public function mount(){
        $this->blog_categories = BlogCategory::all();
        $this->blog_articles = BlogArticle::limit($this->per_page)->get();
        $this->total_article = BlogArticle::count();
        $this->total_page = ceil($this->total_article / $this->per_page);
    }

    public function changePage($page){
        $this->current_page = $page;
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadArticles();
        $this->total_page = ceil($this->total_article / $this->per_page);
    }

    public function categoryFilter($category){
        $this->category = $category;
        $this->reloadArticles();
        $this->total_page = ceil($this->total_article / $this->per_page);
    }

    private function reloadArticles(){
        if($this->category == 'all'){
            if($this->search == ''){
                $start = ($this->current_page - 1) * $this->per_page;

                $this->blog_articles = BlogArticle::offset($start)->limit($this->per_page)->get();
                $this->total_article = BlogArticle::count();
            }
            else{
                $start = ($this->current_page - 1) * $this->per_page;

                $this->blog_articles = BlogArticle::where('title', 'LIKE' , '%'.$this->search.'%')->offset($start)->limit($this->per_page)->get();
                $this->total_article = BlogArticle::where('title', 'LIKE' , '%'.$this->search.'%')->count();
            }
        }
        else{
            if($this->search == ''){
                $start = ($this->current_page - 1) * $this->per_page;

                $this->blog_articles = BlogArticle::where('blog_category_id', $this->category)->offset($start)->limit($this->per_page)->get();
                $this->total_article = BlogArticle::where('blog_category_id', $this->category)->count();
            }
            else{
                $start = ($this->current_page - 1) * $this->per_page;

                $this->blog_articles = BlogArticle::where('blog_category_id', $this->category)->where('title', 'LIKE' , '%'.$this->search.'%')->offset($start)->limit($this->per_page)->get();
                $this->total_article = BlogArticle::where('blog_category_id', $this->category)->where('title', 'LIKE' , '%'.$this->search.'%')->count();
            }
        }
    }

    public function createPost(){
        $this->emit('createPost');
    }

    public function editPost($post_id){
        $this->emit('editPost', $post_id);
    }

    public function deleteConfirm($id){
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function deleteArticle(){
        $article = BlogArticle::find($this->delete_id);
        if($article)
            $article->delete();
        
        $this->dispatchBrowserEvent('hideDeleteModal');
        $this->delete_id = null;
        $this->reloadArticles();
    }

    public function render()
    {
        $this->reloadArticles();
        return view('livewire.admin.blog.blogs');
    }
}
