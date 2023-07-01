<div class="coach-sessions-page multi-option-page">
    <div class="row">
        {{-- PAGE HEADING --}}
        <div class="col-12">
            <div class="d-flex justify-content-between w-100 page-heading">
                <h2 class="fs-2 text-black">Sessions</h2>
                @if(auth()->user()->user_type_id == 2)
                    <a href="javascript:void(0)" class="btn btn-theme"> + Start New Session </a>
                @endif
            </div>
        </div>

        {{-- PAGE CONTENT --}}
        <div class="col-12">
        
            <ul class="multi-option-pages-nav p-2">
                <li class="multi-option-pages-nav-item">
                    <a href="javascript:void(0)">{{ __('My Sessions') }}</a>
                </li>
                @if(auth()->user()->user_type_id == 2)
                <li class="multi-option-pages-nav-item">
                    <a href="javascript:void(0)">{{ __('Upcoming Sessions') }}</a>
                </li>
                @endif
                <li class="multi-option-pages-nav-item"> 
                    <a href="javascript:void(0)">{{ __('Create Your Sessions') }}</a>
                </li>
            </ul>

        </div>

    </div>
</div>
