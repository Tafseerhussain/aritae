<div class="all-users position-relative">

    {{-- <div class="offcanvas offcanvas-end quickview-profile" tabindex="-1" id="viewPlayerProfile" aria-labelledby="viewPlayerProfileLabel">
        
        <div class="offcanvas-header">
            @if ($quickview != '')
            <div class="cover">
                <img src="{{ $quickview->cover_img }}" alt="">
            </div>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
                <div class="d-flex justify-content-between users-search-sort-area">
                    <div class="sorting d-flex">
                        <span class="text-nowrap">Sort by </span>
                        <select class="form-select" wire:model="sort">
                            <option value="">All</option>
                            <option value="last_name">Last Name</option>
                            <option value="experience">Experience</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>
                    <div class="filter-button d-lg-none">
                        <i class="bi bi-funnel"></i>
                    </div>
                    <div class="input-group standard-search">
                        <input type="text" class="form-control" placeholder="Search by name (first and last name)" wire:model.lazy="search">
                        <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row filter-cards">
            {{-- FILTERS --}}
            <div class="col-xl-3 col-lg-4">
                <div class="filters">
                    <div class="close-filter d-lg-none">
                        <span><i class="bi bi-arrow-right-short"></i></span>
                    </div>
                    <h2>
                    Filter Results
                    </h2>
                    <p>
                        What kind of coach are you looking for?
                    </p>
                    <div class="filter">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group standard-search w-100">
                                    <input type="text" class="form-control" placeholder="Search Coaches..." wire:model.defer="searchCoach">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($sports as $sport)
                            <div class="col-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" name="sports[]" wire:model.defer="sport" value="{{ $sport->name }}" type="checkbox" value="" id="{{ $sport->name }}">
                                    <label for="{{ $sport->name }}">{{ $sport->name }}</label>
                                </div>
                            </div>
                            @endforeach
                            {{-- <a href="#" class="more">more choices...</a> --}}
                        </div>
                        <button type="button" class="btn btn-primary btn-sm px-3 py-1 mt-2 d-none d-lg-block" wire:click="apply_filter">Apply</button>
                    </div>
                    <div class="divider"></div>
                    <p>
                        Coach Experience (years)
                    </p>
                    <div class="filter">
                        <div id="experience-slider" wire:ignore></div>
                        <div class="d-flex mt-3 filter-bar">
                            <input type="number" class="form-control me-1" wire:model.defer='minExp' id="minExp">
                            <input type="number" class="form-control ms-1" wire:model.defer='maxExp' id="maxExp">
                        </div>
                        <button type="button" class="btn btn-primary btn-sm px-3 py-1 mt-2 d-none d-lg-block" wire:click="apply_filter">Apply</button>
                    </div>
                    <div class="divider"></div>
                    <p>
                        What is your hourly($) budget?
                    </p>
                    <div class="filter">
                        <div id="hourly-slider" wire:ignore></div>
                        <div class="d-flex mt-3 filter-bar">
                            <input type="number" class="form-control me-1" wire:model.defer='minRate' id="minRate">
                            <input type="number" class="form-control ms-1" wire:model.defer='maxRate' id="maxRate">
                        </div>
                        <button type="button" class="btn btn-primary btn-sm px-3 py-1 mt-2 d-none d-lg-block" wire:click="apply_filter">Apply</button>
                    </div>
                    <div class="divider"></div>
                    <p>Where are you located?</p>
                    <div class="filter">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group standard-search w-100">
                                    <input type="text" class="form-control" placeholder="Search Locations..." wire:model.defer="searchLocation">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($locations as $location)
                            <div class="col-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" name="locations[]" wire:model.defer="location" value="{{ $location->location }}" type="checkbox" value="" id="{{ $location->location }}">
                                    <label for="{{ $location->location }}">{{ $location->location }}</label>
                                </div>
                            </div>
                            @endforeach
                            {{-- <a href="#" class="more">more choices...</a> --}}
                        </div>
                        <button type="button" class="btn btn-primary btn-sm px-3 py-1 mt-2 d-none d-lg-block" wire:click="apply_filter">Apply</button>
                    </div>
                    <div class="divider"></div>
                    <p>Which gender of coach do you prefer?</p>
                    <div class="filter d-flex">
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" name="coach-gender" wire:model.defer="gender" value="male" id="male-coach">
                            <label for="male-coach">Male</label>
                        </div>
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" name="coach-gender" wire:model.defer="gender" value="female" id="female-coach">
                            <label for="female-coach">Female</label>
                        </div>
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" name="coach-gender" wire:model.defer="gender" value="any" id="any-gender" checked>
                            <label for="any-gender">Any</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm px-3 py-1 mt-2 d-none d-lg-block" wire:click="apply_filter">Apply</button>
                    <div class="w-100 d-flex justify-content-center mt-4 d-lg-none">
                        <button type="button" class="btn btn-primary" wire:click="apply_filter">Apply</button>
                    </div>
                    {{-- <button class="btn btn-theme mt-4 d-block w-100" wire:click="filterResults">
                    Filter Results
                    </button> --}}
                </div>
            </div>
            {{-- COACHES CARDS --}}
            <div class="col-xl-9 col-lg-8">
                <div class="row loading-state my-5" wire:loading>
                    <div class="col-12 text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="profile-cards" wire:loading.remove>
                    @if ($coaches->isEmpty())
                    <div class="mt-5 text-center nothing-found">
                        <img src="{{ asset('assets/icons/not-found.svg') }}" alt="nothing found">
                        <h3 class="mt-5">No Records Found </h3>
                        @if ($search != '')
                        for "<span class="text-danger">{{ $search }}</span>"
                        @endif
                    </div>
                    @else
                    <div class="row g-3">
                        @foreach ($coaches as $coach)
                        
                        <div class="col-xl-4 col-md-6">
                            <div class="profile-card h-100">
                                <div class="rate">
                                    ${{ $coach->hourly_rate }} <span>/h</span>
                                </div>
                                <div class="card-cover">
                                    @if($coach->cover_img == '')
                                        <img src="{{ asset('assets/img/default/default-cover.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset($coach->cover_img) }}" alt="">
                                    @endif
                                </div>
                                <div class="card-profile-img">
                                    @if($coach->profile_img == '')
                                        <img src="{{ asset('assets/img/default/default-profile-pic.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset($coach->profile_img) }}" alt="">
                                    @endif
                                </div>
                                <div class="card-profile-meta">
                                    <div class="name">
                                        {{ $coach->full_name }}
                                    </div>
                                    <div class="designation">
                                        <span>{{ $coach->designation }}</span><br>
                                        <span class="exp">
                                            for {{ $coach->experience }} year(s)
                                        </span>
                                        <span>{{ $coach->sport }}</span>
                                    </div>
                                    <div class="rating">
                                        @for ($i = 1; $i <= $coach->rating; $i++)
                                        <span><i class="fa-solid fa-star"></i></span>
                                        @endfor
                                        @php
                                        $starsLeft = 5 - $coach->rating;
                                        @endphp
                                        @for ($j = 1; $j <= $starsLeft; $j++)
                                        <span><i class="fa-regular fa-star"></i></span>
                                        @endfor
                                        
                                    </div>
                                    <div class="divider"></div>
                                    <div class="location">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>{{ $coach->country }}</span>
                                    </div>
                                    <a class="btn btn-dark" href="{{ route('coach.profile.preview', $coach->user_id) }}">
                                        View Profile
                                    </a>
                                    @if($coach->userType->id == 2)
                                        @if (Auth::user())
                                            @if (Auth::user()->userType->type == 'player')
                                                <livewire:coach.request.form :coach_id="$coach->user_id" :key="'article-form-key' . time()" />
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-theme hire-coach icon-right-full">
                                                <span class="me-2">Send Request</span>
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <div class="pagination justify-content-center">
                                {{ $coaches->links() }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')

<script>
$(function () {
// var $propertiesForm = $('.mall-category-filter');
var $body = $('body');
var experienceSlider = document.getElementById('experience-slider');
var hourlySlider = document.getElementById('hourly-slider');
var minExp = document.getElementById('minExp');
var maxExp = document.getElementById('maxExp');
var minRate = document.getElementById('minRate');
var maxRate = document.getElementById('maxRate');
noUiSlider.create(experienceSlider, {
    start: [1, 10],
    connect: true,
    tooltips: {
        to: function(numericValue) {
            return numericValue.toFixed(0);
        }
    },
    range: {
        min: 1,
        max: 10
    },
});
experienceSlider.noUiSlider.on('update', function (value) {
    @this.set('minExp', Math.round(value[0]), true);
    @this.set('maxExp', Math.round(value[1]), true);

    minExp.value = Math.round(value[0]);
    maxExp.value = Math.round(value[1]);
});

noUiSlider.create(hourlySlider, {
    start: [10, 100],
    connect: true,
    tooltips: {
        to: function(numericValue) {
            return numericValue.toFixed(0);
        }
    },
    range: {
        min: 10,
        max: 100
    },
});
hourlySlider.noUiSlider.on('update', function (value) {
    @this.set('minRate', Math.round(value[0]), true);
    @this.set('maxRate', Math.round(value[1]), true);

    minRate.value = Math.round(value[0]);
    maxRate.value = Math.round(value[1]);
});

})
</script>
@endpush