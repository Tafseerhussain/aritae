<div class="card p-3 certifications">

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
            <strong class="me-auto">Certificates</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div wire:ignore.self class="modal fade" id="deleteCertificateModal" tabindex="-1" aria-labelledby="deleteCertificateModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteCertificateModalLabel">Delete Certificate?</h1>
            <button type="button" class="btn-close btn-close-2" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <button type="button" class="btn btn-danger" wire:click="deleteCertificatePermanent()" onclick="hideModal2()">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-lg mb-3">
                    <label for="certificateName" class="col-form-label">Certificate Name</label>
                    <input id="certificateName" type="text" class="form-control @error('certificateName') is-invalid @enderror" placeholder="Football Expert" wire:model.defer="certificateName">
                    @error('certificateName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg mb-3">
                    <label for="association" class="col-form-label">Club / College</label>
                    <input id="association" type="text" class="form-control @error('association') is-invalid @enderror" placeholder="Example Club" wire:model.defer="association">
                    @error('association')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-3 col-lg-4 mb-3">
                    <label for="certificateYear" class="col-form-label">Certificate Year</label>
                    <select class="form-select form-control  @error('certificateYear') is-invalid @enderror" aria-label="Default select example" wire:model.defer="certificateYear">
                        <option value="" disabled selected>--Year--</option>
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
                    @error('certificateYear')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label class="col-form-label">Upload Your Certificate</label>
                        
                        <div class="personal-dropzone-wrapper @error('certificate') is-invalid border-danger @enderror">
                          <div class="personal-dropzone-desc">
                            <img src="{{ asset('assets/icons/upload-image.svg') }}" alt="upload icon">
                            <p>
                                Choose an image file or drag it here.<br>
                                <small>JPG or PNG file size no more than 2MB</small>
                            </p>
                          </div>
                          <div class="browse">
                              SELECT FILE
                          </div>
                          <input type="file" name="img_logo" id="coach_certificate" class="personal-dropzone" accept=".png, .jpeg, .jpg" wire:model.defer="certificate">
                        </div>
                        @error('certificate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="preview-zone visually-hidden">
                          <div class="box box-solid">
                            <div class="box-header with-border">
                              {{-- <div class="box-tools">
                                <button type="button" class="btn-danger remove-preview btn-sm">
                                  <i class="fa fa-times"></i> Remove
                                </button>
                              </div> --}}
                            </div>
                            <div class="box-body text-start"></div>
                          </div>
                        </div>
                    </div>
                    @if ($certificate)
                        <img src="{{ $certificate->temporaryUrl() }}" style="width: 150px" class="mt-2 img-thumbnail">
                    @endif
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

        {{-- COACH CERTIFICATES --}}
        @if (count($certificates) <= 0)
            <hr>
            <div class="text-center">
                No Certificates Added!
            </div>
        @else
        <div class="profile-table certifications-table border mt-4">
            <h5 class="text-center mt-3 fw-bold text-primary">Certificates</h5>
            <hr class="mb-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Certificate Name</th>
                        <th scope="col">Association</th>
                        <th scope="col">Year</th>
                        <th scope="col" class="text-center">Certificate</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $key => $certificate)
                        <tr>
                            <td scope="row">{{ $key + 1 }} </td>
                            <td><span>{{ $certificate->certificate_name }}</span></td>
                            <td><span>{{ $certificate->association }}</span></td>
                            <td><span>{{ $certificate->certification_year }}</span></td>
                            <td class="text-center">
                                <a href="/{{ $certificate->certificate }}" target="_blank" class="cursor-pointer text-dark" data-bs-toggle="tooltip" data-bs-title="View Certificate">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td class="action">
                                <span href="#" class="edit" wire:click="editCertificate({{ $certificate->id }})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                                <span class="delete" 
                                    wire:click="deleteCertificate({{ $certificate->id }})" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteCertificateModal">
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
        function hideModal2() {
            $(".btn-close-2").click();
        }
    </script>

@endpush