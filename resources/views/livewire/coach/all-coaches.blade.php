<div class="all-coaches">
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
                    <div class="input-group coaches-search">
                        <input type="text" class="form-control" placeholder="Search by name (first and last name)" wire:model="search">
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
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Aerobics">
                                    <label for="Aerobics">Aerobics</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Archery">
                                    <label for="Archery">Archery</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Baseball">
                                    <label for="Baseball">Baseball</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Basketball">
                                    <label for="Basketball">Basketball</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Badminton">
                                    <label for="Badminton">Badminton</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Cricket">
                                    <label for="Cricket">Cricket</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Curling">
                                    <label for="Curling">Curling</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Canoeing">
                                    <label for="Canoeing">Canoeing</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Discus-Throw">
                                    <label for="Discus-Throw">Discus Throw</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Dodgeball">
                                    <label for="Dodgeball">Dodgeball</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Equestrianism">
                                    <label for="Equestrianism">Equestrianism</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Football">
                                    <label for="Football">Football</label>
                                </div>
                            </div>
                            <a href="#" class="more">more choices...</a>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <p>
                        Coach Experience (years)
                    </p>
                    <div class="filter">
                        <div id="experience-slider"></div>
                    </div>

                    <div class="divider"></div>

                    <p>
                        What is your hourly($) budget?
                    </p>
                    <div class="filter">
                        <div id="hourly-slider"></div>
                    </div>

                    <div class="divider"></div>

                    <p>Where are you located?</p>
                    <div class="filter">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Albania">
                                    <label for="Albania">Albania</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Algeria">
                                    <label for="Algeria">Algeria</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="AntiguaAndBarbuda">
                                    <label for="AntiguaAndBarbuda">Antigua and Barbuda</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Australia">
                                    <label for="Australia">Australia</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Austria">
                                    <label for="Austria">Austria</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Bahrain">
                                    <label for="Bahrain">Bahrain</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Brazil">
                                    <label for="Brazil">Brazil</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Canada">
                                    <label for="Canada">Canada</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Denmark">
                                    <label for="Denmark">Denmark</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="France">
                                    <label for="France">France</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Greece">
                                    <label for="Greece">Greece</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="filter-value d-flex">
                                    <input class="form-check-input mt-0" type="checkbox" value="" id="Hawaii">
                                    <label for="Hawaii">Hawaii</label>
                                </div>
                            </div>
                            <a href="#" class="more">more choices...</a>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <p>Which gender of coach do you prefer?</p>
                    <div class="filter d-flex">
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" value="" id="male-coach" name="coach-type">
                            <label for="male-coach">Male</label>
                        </div>
                        <div class="d-flex gender-preference flex-fill">
                            <input class="form-check-input mt-0" type="radio" value="" id="female-coach" name="coach-type">
                            <label for="female-coach">Female</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COACHES CARDS --}}
            <div class="col-lg-9">
                <div class="profile-cards">
                    <div class="row g-3">
                        @foreach ($coaches as $coach)
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="profile-card">
                                <div class="card-cover">
                                    <img src="{{ $coach->cover_img }}" alt="">
                                </div>
                                <div class="card-profile-img">
                                    <img src="{{ $coach->profile_img }}" alt="">
                                </div>
                                <div class="card-profile-meta">
                                    <div class="name">
                                        {{ $coach->name }}
                                    </div>
                                    <div class="designation">
                                        {{ $coach->designation }}
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
                                        <span>{{ $coach->location }}</span>
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
                </div>
            </div>

        </div>
    </div>
</div>