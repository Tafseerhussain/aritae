<div class="card p-3 videos">

    @if (session()->has('success_message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast d-block border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header text-white bg-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Videos</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div class="card-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="videoTitle" class="col-form-label">Video Title</label>
                    <input id="videoTitle" type="text" class="form-control @error('videoTitle') is-invalid @enderror" placeholder="Video Title" wire:model.defer="videoTitle">
                    @error('videoTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="videoLink" class="col-form-label">Video Link / URL</label>
                    <input id="videoLink" type="text" class="form-control @error('videoLink') is-invalid @enderror" placeholder="Video Link or URL" wire:model.defer="videoLink">
                    @error('videoLink')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-theme">
                        Save
                    </button>
                </div>
            </div>
        </form>

        <hr>

        <div class="row videos">
            @if (count($videos) <= 0)
                <div class="text-center">
                    No Videos Added!
                </div>
            @else
                <div class="col-12">
                    <h5 class="fw-bold mb-3">Videos</h5>
                </div>
                @foreach ($videos as $video)
                    <div class="col-md-6">
                        <div class="video">
                            <iframe width="100%" height="270" src="{{ $video->video_link }}" title="{{ $video->video_title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>