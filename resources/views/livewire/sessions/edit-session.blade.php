<div class="session-create-page">
    <form method="POST" wire:submit.prevent="submitSession">
        <h5 class="mt-3 mb-0 fw-bold">Session Information</h5>
        <div class="card w-100 mt-2 pb-2">
            <div class="row session-info p-2 g-2 px-3">
                <div class="col-12 mb-2">
                    <label for="name" class="col-form-label fw-bold">{{ __('Session Name') }}</label>
                    <input id="name" type="text" class="form-control @error('session_name') is-invalid @enderror" placeholder="Example Session" autofocus wire:model="session_name">

                    @error('session_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row session-info p-2 g-2 px-3">
                <div class="col-md-6 mb-2">
                    <label for="sport" class="col-form-label fw-bold">{{ __('Sport') }}</label>
                    <select id="sport" class="form-control @error('sport') is-invalid @enderror" wire:model="sport">
                        <option value="">Select Sport</option>
                        @foreach($sports as $sport)
                        <option value="{{$sport->name}}">{{$sport->name}}</option>
                        @endforeach
                    </select>

                    @error('sport')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="phone" class="col-form-label fw-bold">{{ __('Phone Number') }}</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="+923325451782" wire:model="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row session-info p-2 g-2 px-3">
                <div class="col-12 mb-2">
                    <label class="form-label fw-bold">
                        Session
                    </label><br>
                    <div class="form-check float-start me-3">
                        <input class="form-check-input" name="session-type" type="checkbox" value="video-session" id="video-session" wire:model="video_session">
                        <label class="form-check-label fw-normal" for="video-session">
                            Video Session
                        </label>
                    </div>
                    <div class="form-check float-start me-3">
                        <input class="form-check-input" name="session-type" type="checkbox" value="site-session" id="site-session" wire:model="site_session">
                        <label class="form-check-label fw-normal" for="site-session">
                            On Site
                        </label>
                    </div>
                </div>
                @error('site_session')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row session-info p-2 g-2 px-3">
                <div class="col-12 mb-2">
                    <label for="location" class="col-form-label fw-bold">{{ __('Location') }}</label>
                    <input id="name" type="text" class="form-control @error('location') is-invalid @enderror" placeholder="Auckland, Newzealand" wire:model="location">

                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row session-info p-2 g-2 px-3">
                <div class="col-12 mb-2">
                    <label for="description" class="col-form-label fw-bold">{{ __('Description') }}</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Write Here" wire:model="description"></textarea>
                    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Session Coach -->
        @if(count($coaches) > 0)
        <h5 class="mt-4 mb-0 fw-bold">Choose Session Coach</h5>
        <div class="card w-100 mt-2">
            <div class="row m-0 py-3 session-coach-container">
                @foreach($coaches as $coach)
                <div class="col-12 px-3 py-3 session-coach d-flex justify-content-start align-items-start {{in_array($coach->id, $selected_coaches) ? 'selected' : ''}}" wire:click="toggleCoach({{$coach->id}})">
                    <div class="coach-image">
                        @if($coach->profile_img)
                        <img src="{{asset($coach->profile_img)}}" alt="Coach Name">
                        @else
                        <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Coach Name">
                        @endif
                    </div>
                    <div class="px-2 coach-detail">
                        <h6 class="fw-bold m-0 coach-name">{{$coach->user->full_name}}</h6>
                        <span class="text-secondary coach-email">{{$coach->user->email}}</span><br>
                        <p class="text-secondary m-0 coach-sport">Sport: <span class="text-dark">{{$coach->user->area_of_focus}} Coach</span></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="row my-3">
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">{{__('Update')}}</button>
            </div>
        </div>
    </form>
</div>