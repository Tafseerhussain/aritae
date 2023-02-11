<div class="settings">
    <div class="row">
        <div class="col-12">
            @if($activeComponent == 'credential')
                @livewire('settings.credential')
            @elseif($activeComponent == 'payment')
                @livewire('settings.payment')
            @else
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="fw-semibold m-0">Settings</h4>
                            <span class="text-secondary">Update your preferences at any time.</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-4 col-lg-6 col-sm-12">
                            <div class="d-flex justify-content-between align-items-center settings-section">
                                <span>Edit Profile</span>
                                @if(auth()->user()->user_type_id == 1)
                                <a href="{{route('admin.profile')}}" class="text-dark">
                                    <i class="bi bi-pencil-square" role="button"></i>
                                </a>
                                @elseif(auth()->user()->user_type_id == 2)
                                <a href="{{route('coach.profile')}}" class="text-dark">
                                    <i class="bi bi-pencil-square" role="button"></i>
                                </a>
                                @elseif(auth()->user()->user_type_id == 3)
                                <a href="{{route('parent.profile')}}" class="text-dark">
                                    <i class="bi bi-pencil-square" role="button"></i>
                                </a>
                                @elseif(auth()->user()->user_type_id == 2)
                                <a href="{{route('player.profile')}}" class="text-dark">
                                    <i class="bi bi-pencil-square" role="button"></i>
                                </a>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center settings-section">
                                <span>Change Username/Password</span>
                                <a href="javascript:void(0)" class="text-dark" wire:click="credential">
                                    <i class="bi bi-pencil-square" role="button"></i>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center settings-section">
                                <span>Change Payment Method</span>
                                <a href="javascript:void(0)" class="text-dark" wire:click="payment">
                                    <i class="bi bi-pencil-square" role="button"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <h4 class="fw-semibold m-0">Notification Preferences</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notification-email" wire:model="sendUpdateEmail">
                                <label class="form-check-label" for="notification-email">
                                    Send me updates via email
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notification-push" wire:model="sendUpdatePush">
                                <label class="form-check-label" for="notification-push">
                                    Send me updates via push notification
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <h4 class="fw-semibold m-0">Email Subscriptions</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="subscription-community" wire:model="sendUpdateCommunity">
                                <label class="form-check-label" for="subscription-community">
                                    Send me updates about the ARITAE community via email
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="subscription-event" wire:model="sendUpdateEvent">
                                <label class="form-check-label" for="subscription-event">
                                    Send me updates about events in my area via email
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="subscription-inspiration" wire:model="sendInspirationalEmail">
                                <label class="form-check-label" for="subscription-inspiration">
                                    Send me inspirational emails
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-start align-items-center">
                            <button class="btn btn-theme me-4" wire:click="saveSettings">Save</button>
                            <button class="btn btn-danger me-4 text-light" wire:click="openDeleteModal">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deleting Your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete your Aritae account permanently?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark text-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger text-light" wire:click="deleteAccount">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('openDeleteModal', function(){
            $('#deleteModal').modal('show');
        })
    </script>
</div>
