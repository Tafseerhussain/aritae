<div class="hire-coach-component">

    @if($hired)
        <div class="btn btn-success mt-4"><code class="text-white">Hired</code></div>
    @elseif($requested)
        <div class="btn btn-primary mt-4"><code class="text-white">Request Already Sent</code></div>
    @else
    <div class="loader-bg" wire:loading>
        <div class="loader-self">
            <span class="loader"></span>
        </div>
    </div>
    
    @if (session()->has('success_message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast d-block border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header text-white bg-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Hire Request</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div wire:ignore.self class="modal fade" id="hireCoachModal-{{$coach_id}}" tabindex="-1" aria-labelledby="hireCoachModalLabel-{{$coach_id}}" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-2" id="hireCoachModalLabel-{{$coach_id}}">Send Request</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="requestTitle-{{$coach_id}}" class="col-form-label">Request Title</label>
                        <input id="requestTitle-{{$coach_id}}" type="text" class="form-control @error('requestTitle') is-invalid @enderror" placeholder="Football Expert" wire:model.defer="requestTitle">
                        @error('requestTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="proposalMessage-{{$coach_id}}" class="col-form-label">Request Message / Proposal</label>
                        <textarea id="proposalMessage-{{$coach_id}}" class="form-control  @error('proposalMessage') is-invalid @enderror" placeholder="Football Expert" rows="5" wire:model.defer="proposalMessage"></textarea>
                        @error('proposalMessage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 text-end mb-4">
                        <button type="submit" class="btn btn-theme" onclick="hideModal()">
                            Send Request
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <button class="btn btn-theme hire-coach icon-right-full" 
        data-bs-toggle="modal" 
        data-bs-target="#hireCoachModal-{{$coach_id}}">
        <span class="me-2">Send Request</span>
        <i class="fa-solid fa-arrow-right-long"></i>
    </button>
    @endif
</div>

@push('custom-scripts')

    <script>
        function hideModal() {
            $(".btn-close").click();
        }
    </script>

@endpush