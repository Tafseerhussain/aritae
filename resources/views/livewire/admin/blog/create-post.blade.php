<div class="admin-blog">
    <div class="row">
        <div class="col-12 d-flex justify-content-end align-items-center">
            <button class="btn btn-theme my-2" wire:click="back">
                <i class="bi bi-arrow-left"></i>    
                Back
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="title" class="col-form-label fw-bold">Title</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" wire:model.defer="title" placeholder="Title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="subtitle" class="col-form-label fw-bold">Subtitle</label>
                    <textarea id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" wire:model.defer="subtitle" placeholder="Subtitle"></textarea>
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="introduction" class="col-form-label fw-bold">Introduction</label>
                    <textarea id="introduction" class="form-control @error('introduction') is-invalid @enderror" wire:model.defer="introduction" placeholder="Introduction"></textarea>
                    @error('introduction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="category" class="col-form-label fw-bold">Category</label>
                    <select id="category" class="form-control @error('category') is-invalid @enderror" wire:model.defer="category">
                        <option value="">Select a Category</option>
                        @foreach($categories as $single_category)    
                        <option value="{{$single_category->id}}">{{ $single_category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <label for="thumb-file" class="col-form-label fw-bold">Thumbnail</label><br>
                    <button class="btn btn-theme" id="thumb-upload" onclick="document.getElementById('thumb-file').click()">Upload Thumbnail</button>
                    <input type="file" id="thumb-file" accept="image/*" wire:model="thumbnail" hidden>
                    @error('thumbnail')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div id="thumb-container" wire:ignore>
                        <!--<div class="img-container thumb-image">
                            <img src="{{asset('assets/img/default/placeholder-image.png')}}">
                            <div class="progress">
                                <div class="progress-fill"></div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="more-imgs-file" class="col-form-label fw-bold">More Images</label><br>
                    <button class="btn btn-theme" id="more-imgs-upload" onclick="document.getElementById('more-imgs-file').click()">Upload Image</button>
                    <input type="file" id="more-imgs-file" accept="image/*" wire:model="more_imgs" hidden>
                    @error('more_imgs')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div id="more-imgs-container" wire:ignore>
                        <!--<div class="img-container thumb-image">
                            <img src="{{asset('assets/img/default/placeholder-image.png')}}">
                            <div class="progress">
                                <div class="progress-fill"></div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="quote" class="col-form-label fw-bold">Quote</label>
                    <textarea id="quote" class="form-control @error('quote') is-invalid @enderror" wire:model.defer="quote" placeholder="Quote"></textarea>
                    @error('quote')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="quote-by" class="col-form-label fw-bold">Quote By</label>
                    <input type="text" id="quote-by" class="form-control @error('quote_by') is-invalid @enderror" wire:model.defer="quote_by" placeholder="Quote By">
                    @error('quote_by')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <div wire:ignore>
                        <label for="long-text" class="col-form-label fw-bold">Long Text</label>
                        <textarea id="long-text" class="form-control @error('long_text') is-invalid @enderror" wire:model.defer="long_text" placeholder="Long Text"></textarea>
                    </div>
                    @error('long_text')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="foot-note" class="col-form-label fw-bold">Footnote</label>
                    <textarea id="foot-note" class="form-control @error('foot_note') is-invalid @enderror" wire:model.defer="foot_note" placeholder="Footnote"></textarea>
                    @error('foot_note')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-theme" wire:click="createPost">Create Post</button>
                </div>
            </div>
        </div>
    </div>
</div>
