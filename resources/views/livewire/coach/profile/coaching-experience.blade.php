<div class="card p-3 coaching-exp">

    @if (session()->has('success_message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast d-block border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header text-white bg-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Coaching Experience</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div wire:ignore.self class="modal fade" id="deleteExperienceModal" tabindex="-1" aria-labelledby="deleteExperienceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteExperienceModalLabel">Delete Experience?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="#">
                <div class="">
                    <label for="profileImage" class="form-label">Are you sure you want to remove this record? This action is irreversible.
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" wire:click="deleteExperiencePermanent()" onclick="hideModal()">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="clubName" class="col-form-label">Club Name</label>
                    <input id="clubName" type="text" class="form-control @error('clubName') is-invalid @enderror" placeholder="Lorem Club" wire:model.defer="clubName">
                    @error('clubName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="position" class="col-form-label">Position / Title</label>
                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" placeholder="Football Coach" wire:model="position">
                    @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="experienceDescription" class="col-form-label">Description</label>
                    <textarea rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Start typing here..." wire:model="description"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="timePeriod" class="col-form-label">Time Period</label>
                </div>
                <div class="col-lg mb-3">
                    <div class="row g-2">
                        <div class="col-7">
                            <select class="form-select form-control  @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model="startingMonth">
                                <option value='' disabled>--Select Month--</option>
                                <option selected value='Janaury'>Janaury</option>
                                <option value='February'>February</option>
                                <option value='March'>March</option>
                                <option value='April'>April</option>
                                <option value='May'>May</option>
                                <option value='June'>June</option>
                                <option value='July'>July</option>
                                <option value='August'>August</option>
                                <option value='September'>September</option>
                                <option value='October'>October</option>
                                <option value='November'>November</option>
                                <option value='December'>December</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <select class="form-select form-control  @error('startingYear') is-invalid @enderror" aria-label="Default select example" wire:model="startingYear">
                                <option value="" selected>--Select Year--</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
                    @error('timePeriod')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                _
                <div class="col-lg mb-3">
                    <div class="row g-2">
                        <div class="col-7">
                            <select class="form-select form-control  @error('endingMonth') is-invalid @enderror" aria-label="Default select example" wire:model="endingMonth">
                                <option selected value=''>--Select Month--</option>
                                <option value='Janaury'>Janaury</option>
                                <option value='February'>February</option>
                                <option value='March'>March</option>
                                <option value='April'>April</option>
                                <option value='May'>May</option>
                                <option value='June'>June</option>
                                <option value='July'>July</option>
                                <option value='August'>August</option>
                                <option value='September'>September</option>
                                <option value='October'>October</option>
                                <option value='November'>November</option>
                                <option value='December'>December</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <select class="form-select form-control  @error('endingYear') is-invalid @enderror" aria-label="Default select example" wire:model="endingYear">
                                <option value="" selected>--Select Year--</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
                    @error('timePeriod')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 text-end">
                    @if ($editSave == 1)
                        <button type="submit" class="btn btn-theme">
                            Save
                        </button>
                    @elseif ($editSave == 2)
                        <a href="#!" class="btn btn-danger text-white me-1" wire:click="updateEditSave(1)">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-theme">
                            Update
                        </button>
                    @endif
                </div>
            </div>
        </form>

        {{-- COACH EXPERIENCES --}}
        @if (count($experiences) <= 0)
            <hr>
            <div class="text-center">
                No Experiences Added!
            </div>
        @else
        <div class="profile-table experiences-table border mt-4">
            <h5 class="text-center mt-3 fw-bold text-primary">Experiences</h5>
            <hr class="mb-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Club Name</th>
                        <th scope="col">Position/Title</th>
                        <th scope="col">Time Period</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiences as $key => $exp)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td><span>{{ $exp->club_name }}</span></td>
                            <td><span>{{ $exp->position }}</span></td>
                            <td><span>{{ $exp->start_month }} {{ $exp->start_year }} - {{ $exp->end_month }} {{ $exp->end_year }}</span></td>
                            <td class="action">
                                <span class="edit" wire:click="editExperience({{ $exp->id }})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                                <span class="delete" 
                                    wire:click="deleteExperience({{ $exp->id }})" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteExperienceModal">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <div class="text-center mb-3">
                <a href="#" class="btn btn-theme btn-sm">View All</a>
            </div> --}}
        </div>
        @endif

    </div>
</div>

@push('custom-scripts')

    <script>
        function hideModal() {
            $(".btn-close").click();
        }
    </script>

@endpush