<div class="admin-blog">
    <div class="row">
        <div class="col-12 d-flex justify-content-end align-items-center">
            <button class="btn btn-theme my-2" wire:click="createPost">Create New Post</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">Blog</h3>
                    <div class="search-filter">
                        <div class="d-flex">
                            <div class="input-group input-group-sm mx-2 search-input">
                                <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                            </div>
                            <div class="dropdown mx-2 filter-category">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="categoryFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                    All
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="cateogryFilter">
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="categoryFilter('all')">All</a></li>
                                    @foreach($blog_categories as $category)
                                    <li><a class="dropdown-item text-capitalize" href="javascript:void(0)" wire:click="categoryFilter('{{$category->id}}')">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($blog_articles as $article)
            <div class="row article-body mx-0 my-3">
                <div class="col-12 p-3 d-flex justify-content-between align-items-center">
                    <div class="blog-info d-flex justify-content-start align-items-center">
                        
                        @if($article->img)
                        <img class="article-image me-2" src="{{asset($article->img)}}" alt="{{$article->title}}" onerror="this.src='{{asset('assets/img/default/placeholder-image.png')}}'">
                        @else
                        <img class="article-image me-2" src="{{asset('assets/img/default/placeholder-image.png')}}" alt="{{$article->title}}">
                        @endif

                        <div>
                            <h5 class="fs-6 fw-bold m-0">{{$article->title}}</h5>
                            <span class="text-secondary">{{$article->subtitle}}</span>
                            <p class="text-secondary m-0">
                                Time: {{ $article->created_at->diffForHumans(); }}
                            </p>
                        </div>
                    </div>
                    <div class="ms-2">
                        <a class="btn btn-sm btn-theme mb-2" href="{{config('frontend.url').'/blogs/'.$article->id.'/'.strtolower(str_replace(' ', '-', $article->title))}}" target="_blank">
                            <i class="bi bi-eye"></i>
                            View
                        </a>
                        <button class="btn btn-sm btn-theme mb-2" wire:click="editPost({{$article->id}})">
                            <i class="bi bi-pen"></i>
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger text-white mb-2" wire:click="deleteConfirm({{$article->id}})">
                            <i class="bi bi-trash"></i>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <button class="btn btn-theme m-2 px-2 py-1" {{($current_page <= 1) ? 'disabled' : ''}} wire:click="changePage({{$current_page - 1}})"><i class="bi bi-chevron-left"></i></button>
            <span class="m-2">Page {{$current_page}} of {{$total_page}}</span>
            <button class="btn btn-theme m-2 px-2 py-1" {{($current_page >= $total_page) ? 'disabled' : ''}} wire:click="changePage({{$current_page + 1}})"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="deleteArticle">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteBlogModalLabel">Delete Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this article?
                        <input type="text" wire:model="delete_id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger text-white">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openDeleteModal', event => {
            $("#deleteBlogModal").modal('show');
        })

        window.addEventListener('hideDeleteModal', event => {
            $("#deleteBlogModal").modal('hide');
        })
    </script>
</div>
