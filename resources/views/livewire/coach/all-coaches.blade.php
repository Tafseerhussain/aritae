<div class="all-coaches position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <div class="sorting d-flex">
                        <span class="text-nowrap">Sort by </span>
                        <select class="form-select">
                            <option>All</option>
                            <option>Last Name</option>
                            <option>Experience</option>
                            <option>Rating</option>
                        </select>
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
            <div class="col-lg-3">
                <div class="filters">
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
                                    <input type="text" class="form-control" placeholder="Search Coaches..." wire:model.lazy="searchCoach">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($sports as $sport)
                                <div class="col-lg-6">
                                    <div class="filter-value d-flex">
                                        <input class="form-check-input mt-0" name="sports[]" wire:model="sport" value="{{ $sport->name }}" type="checkbox" value="" id="{{ $sport->name }}">
                                        <label for="{{ $sport->name }}">{{ $sport->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <a href="#" class="more">more choices...</a> --}}
                        </div>
                    </div>

                    <div class="divider"></div>

                    <p>
                        Coach Experience (years)
                    </p>
                    <div class="filter">
                        <div id="experience-slider" wire:ignore></div>
                        <div class="d-flex mt-3 filter-bar">
                            <input type="number" class="form-control me-1" wire:model='minExp' id="minExp">
                            <input type="number" class="form-control ms-1" wire:model='maxExp' id="maxExp">
                        </div>
                    </div>

                    <div class="divider"></div>

                    <p>
                        What is your hourly($) budget?
                    </p>
                    <div class="filter">
                        <div id="hourly-slider" wire:ignore></div>
                        <div class="d-flex mt-3 filter-bar">
                            <input type="number" class="form-control me-1" wire:model='minRate' id="minRate">
                            <input type="number" class="form-control ms-1" wire:model='maxRate' id="maxRate">
                        </div>
                    </div>

                    <div class="divider"></div>

                    <p>Where are you located?</p>
                    <div class="filter">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group standard-search w-100">
                                    <input type="text" class="form-control" placeholder="Search Locations..." wire:model.lazy="searchLocation">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($locations as $location)
                                <div class="col-lg-6">
                                    <div class="filter-value d-flex">
                                        <input class="form-check-input mt-0" name="locations[]" wire:model="location" value="{{ $location->location }}" type="checkbox" value="" id="{{ $location->location }}">
                                        <label for="{{ $location->location }}">{{ $location->location }}</label>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <a href="#" class="more">more choices...</a> --}}
                        </div>
                    </div>

                    <div class="divider"></div>

                    <p>Which gender of coach do you prefer?</p>
                    <div class="filter d-flex">
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" wire:model="gender" value="male" id="male-coach">
                            <label for="male-coach">Male</label>
                        </div>
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" wire:model="gender" value="female" id="female-coach">
                            <label for="female-coach">Female</label>
                        </div>
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" wire:model="gender" value="any" id="any-gender" checked>
                            <label for="any-gender">Any</label>
                        </div>
                    </div>
                    {{-- <button class="btn btn-theme mt-4 d-block w-100" wire:click="filterResults">
                        Filter Results
                    </button> --}}
                </div>
            </div>

            {{-- COACHES CARDS --}}
            <div class="col-lg-9">
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
                        <div class="col-12">
                            {{ $coach->user->sports }}
                        </div>
                        @foreach ($coaches as $coach)
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="profile-card h-100">
                                <div class="rate">
                                    ${{ $coach->hourly_rate }} <span>/h</span>
                                </div>
                                <div class="card-cover">
                                    <img src="{{ asset($coach->coach->cover_img) }}" alt="">
                                </div>
                                <div class="card-profile-img">
                                    <img src="{{ asset($coach->coach->profile_img) }}" alt="">
                                </div>
                                <div class="card-profile-meta">
                                    <div class="name">
                                        {{ $coach->full_name }}
                                    </div>
                                    <div class="designation">
                                        <span>{{ $coach->coach->designation }}</span><br>
                                        <span class="exp">
                                            for {{ $coach->experience }} year(s)
                                        </span>
                                        <span>{{ $coach->coach->sport }}</span>
                                    </div>
                                    <div class="rating">
                                        @for ($i = 1; $i <= $coach->coach->rating; $i++)
                                            <span><i class="fa-solid fa-star"></i></span>
                                        @endfor
                                        @php
                                            $starsLeft = 5 - $coach->coach->rating;
                                        @endphp
                                        @for ($j = 1; $j <= $starsLeft; $j++)
                                            <span><i class="fa-regular fa-star"></i></span>
                                        @endfor
                                        
                                    </div>
                                    <div class="divider"></div>
                                    <div class="location">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>{{ $coach->coach->location }}</span>
                                    </div>
                                    <a href="#" class="btn btn-theme">
                                        View Profile
                                    </a>
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
                @this.set('minExp', value[0]);
                @this.set('maxExp', value[1]);
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
                @this.set('minRate', value[0]);
                @this.set('maxRate', value[1]);
            });

       })     
    </script>
@endpush