<div class="card p-3 education">

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
            <strong class="me-auto">Education</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div wire:ignore.self class="modal fade" id="deleteEducationModal" tabindex="-1" aria-labelledby="deleteEducationModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteEducationModalLabel">Delete Education?</h1>
            <button type="button" class="btn-close btn-close-3" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <button type="button" class="btn btn-danger" wire:click="deleteEducationPermanent()" onclick="hideModal3()">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="institutionName" class="col-form-label">Institution Name</label>
                    <input id="institutionName" type="text" class="form-control @error('institutionName') is-invalid @enderror" placeholder="Instituation Name" wire:model.defer="institutionName">
                    @error('institutionName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="degreeTitle" class="col-form-label">Degree Title</label>
                    <input id="degreeTitle" type="text" class="form-control @error('degreeTitle') is-invalid @enderror" placeholder="Degree Title" wire:model.defer="degreeTitle">
                    @error('degreeTitle')
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
                            <select class="form-select form-control  @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                <option value='' disabled selected>--Select Month--</option>
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
                            <select class="form-select form-control  @error('startingYear') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingYear">
                                <option value="" selected disabled>--Select Year--</option>
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
                </div>
                _
                <div class="col-lg mb-3">
                    <div class="row g-2">
                        <div class="col-7">
                            <select class="form-select form-control  @error('endingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="endingMonth">
                                <option value='' disabled selected>--Select Month--</option>
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
                            <select class="form-select form-control  @error('endingYear') is-invalid @enderror" aria-label="Default select example" wire:model.defer="endingYear">
                                <option value="" selected disabled>--Select Year--</option>
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

        {{-- COACH EDUCATIONS --}}
        @if (count($education) <= 0)
            <hr>
            <div class="text-center">
                No Education Added!
            </div>
        @else
        <div class="profile-table experiences-table border mt-4">
            <h5 class="text-center mt-3 fw-bold text-primary">Educations</h5>
            <hr class="mb-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Time Period</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($education as $key => $edu)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td><span>{{ $edu->institute_name }}</span></td>
                            <td><span>{{ $edu->degree }}</span></td>
                            <td><span>{{ $edu->start_month }} {{ $edu->start_year }} - {{ $edu->end_month }} {{ $edu->end_year }}</span></td>
                            <td class="action">
                                <span href="#" class="edit" wire:click="editEducation({{ $edu->id }})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                                <span class="delete" 
                                    wire:click="deleteEducation({{ $edu->id }})" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteEducationModal">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

@push('custom-scripts')

    <script>
        function hideModal3() {
            $(".btn-close-3").click();
        }
    </script>

@endpush