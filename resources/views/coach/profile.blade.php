@extends('coach.layouts.app')

@section('content')

	<div class="profile-edit-page">
		<div class="row">
			<div class="col-xl-9 col-lg-10 col-md-12 mx-auto">
				{{-- PERSONAL INFO --}}
				<h2 class="mb-3 text-center fs-2" id="info">
					<i class="bi bi-info-circle"></i>
					<span>Personal Info</span>
				</h2>
				@livewire('coach.profile.personal-information')

				{{-- COACHING EXPERINECE --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="experience">
					<i class="bi bi-briefcase"></i>
					<span>Coaching Experience</span>
				</h2>
				<div class="card p-3 coaching-exp">
					<div class="card-body">
						<form action="#">
							<div class="row">
								<div class="col-lg-6 mb-3">
									<label for="clubName" class="col-form-label">Club Name</label>
	                                <input id="clubName" type="text" class="form-control @error('clubName') is-invalid @enderror" placeholder="Lorem Club">
	                                @error('clubName')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-lg-6 mb-3">
									<label for="position" class="col-form-label">Position / Title</label>
	                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" placeholder="Football Coach">
	                                @error('position')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12 mb-3">
									<label for="experienceDescription" class="col-form-label">Description</label>
									<textarea rows="3" class="form-control @error('experienceDescription') is-invalid @enderror" placeholder="Start typing here..."></textarea>
	                                @error('experienceDescription')
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
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
											  	<option value=''>--Select Month--</option>
											    <option selected value='1'>Janaury</option>
											    <option value='2'>February</option>
											    <option value='3'>March</option>
											    <option value='4'>April</option>
											    <option value='5'>May</option>
											    <option value='6'>June</option>
											    <option value='7'>July</option>
											    <option value='8'>August</option>
											    <option value='9'>September</option>
											    <option value='10'>October</option>
											    <option value='11'>November</option>
											    <option value='12'>December</option>
											</select>
										</div>
										<div class="col-5">
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
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
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
											  	<option value=''>--Select Month--</option>
											    <option selected value='1'>Janaury</option>
											    <option value='2'>February</option>
											    <option value='3'>March</option>
											    <option value='4'>April</option>
											    <option value='5'>May</option>
											    <option value='6'>June</option>
											    <option value='7'>July</option>
											    <option value='8'>August</option>
											    <option value='9'>September</option>
											    <option value='10'>October</option>
											    <option value='11'>November</option>
											    <option value='12'>December</option>
											</select>
										</div>
										<div class="col-5">
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
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
									<button type="submit" class="btn btn-theme">
										Save
									</button>
								</div>
							</div>
						</form>

						{{-- COACH EXPERIENCES --}}
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
									<tr>
										<td scope="row">1</td>
										<td><span>Lorem Club</span></td>
										<td><span>Football Coach</span></td>
										<td><span>January 1999 - March 2002</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">2</td>
										<td>Lorem Club</td>
										<td>Football Coach</td>
										<td>January 1999 - March 2002</td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">3</td>
										<td>Lorem Club</td>
										<td>Football Coach</td>
										<td>January 1999 - March 2002</td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">4</td>
										<td>Lorem Club</td>
										<td>Football Coach</td>
										<td>January 1999 - March 2002</td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="text-center mb-3">
								<a href="#" class="btn btn-theme btn-sm">View All</a>
							</div>
						</div>

					</div>
				</div>

				{{-- CERTIFICATIONS --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="certifications">
					<i class="bi bi-patch-check"></i>
					<span>Certifications</span>
				</h2>
				<div class="card p-3 certifications">
					<div class="card-body">
						<form action="#">
							<div class="row">
								<div class="col-lg mb-3">
									<label for="certificateName" class="col-form-label">Certificate Name</label>
	                                <input id="certificateName" type="text" class="form-control @error('certificateName') is-invalid @enderror" placeholder="Lorem Club">
	                                @error('certificateName')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-lg mb-3">
									<label for="clubName" class="col-form-label">Club / College</label>
	                                <input id="clubName" type="text" class="form-control @error('clubName') is-invalid @enderror" placeholder="Lorem Club">
	                                @error('clubName')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-xl-3 col-lg-4 mb-3">
									<label for="certificateYear" class="col-form-label">Certificate Year</label>
	                                <select class="form-select form-control  @error('certificateYear') is-invalid @enderror" aria-label="Default select example">
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
									    <option value="2018" selected>2018</option>
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
                                        
                                        <div class="personal-dropzone-wrapper @error('personalId') border-danger @enderror">
                                          <div class="personal-dropzone-desc">
                                            <img src="{{ asset('assets/icons/upload-image.svg') }}" alt="upload icon">
                                            <p>
                                                Choose an image file or drag it here.<br>
                                                <small>JPG, PNG or PDF file size no more than 10MB</small>
                                            </p>
                                          </div>
                                          <div class="browse">
                                              SELECT FILE
                                          </div>
                                          <input type="file" name="img_logo" class="personal-dropzone">
                                        </div>
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
                                </div>
                                <div class="col-12 text-end">
									<button type="submit" class="btn btn-theme">
										Save
									</button>
								</div>
							</div>
						</form>

						{{-- COACH CERTIFICATES --}}
						<div class="profile-table experiences-table border mt-4">
							<h5 class="text-center mt-3 fw-bold text-primary">Certificates</h5>
							<hr class="mb-0">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Certificate Name</th>
										<th scope="col">Club/College</th>
										<th scope="col">Year</th>
										<th scope="col" class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row">1</td>
										<td><span>Football Coach</span></td>
										<td><span>Lorem Club</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">2</td>
										<td><span>Football Coach</span></td>
										<td><span>Lorem Club</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">3</td>
										<td><span>Football Coach</span></td>
										<td><span>Lorem Club</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">4</td>
										<td><span>Football Coach</span></td>
										<td><span>Lorem Club</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="text-center mb-3">
								<a href="#" class="btn btn-theme btn-sm">View All</a>
							</div>
						</div>
					</div>
				</div>

				{{-- EDUCATIONS --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="education">
					<i class="bi bi-mortarboard"></i>
					<span>Education</span>
				</h2>
				<div class="card p-3 education">
					<div class="card-body">
						<form action="#">
							<div class="row">
								<div class="col-12 mb-3">
									<label for="institutionName" class="col-form-label">Institution Name</label>
	                                <input id="institutionName" type="text" class="form-control @error('institutionName') is-invalid @enderror" placeholder="Instituation Name">
	                                @error('institutionName')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12 mb-3">
									<label for="degreeTitle" class="col-form-label">Degree Title</label>
	                                <input id="degreeTitle" type="text" class="form-control @error('degreeTitle') is-invalid @enderror" placeholder="Degree Title">
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
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
											  	<option value=''>--Select Month--</option>
											    <option selected value='1'>Janaury</option>
											    <option value='2'>February</option>
											    <option value='3'>March</option>
											    <option value='4'>April</option>
											    <option value='5'>May</option>
											    <option value='6'>June</option>
											    <option value='7'>July</option>
											    <option value='8'>August</option>
											    <option value='9'>September</option>
											    <option value='10'>October</option>
											    <option value='11'>November</option>
											    <option value='12'>December</option>
											</select>
										</div>
										<div class="col-5">
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
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
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
											  	<option value=''>--Select Month--</option>
											    <option selected value='1'>Janaury</option>
											    <option value='2'>February</option>
											    <option value='3'>March</option>
											    <option value='4'>April</option>
											    <option value='5'>May</option>
											    <option value='6'>June</option>
											    <option value='7'>July</option>
											    <option value='8'>August</option>
											    <option value='9'>September</option>
											    <option value='10'>October</option>
											    <option value='11'>November</option>
											    <option value='12'>December</option>
											</select>
										</div>
										<div class="col-5">
			                                <select class="form-select form-control  @error('timePeriod') is-invalid @enderror" aria-label="Default select example">
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
									<button type="submit" class="btn btn-theme">
										Save
									</button>
								</div>
							</div>
						</form>

						{{-- COACH EDUCATIONS --}}
						<div class="profile-table experiences-table border mt-4">
							<h5 class="text-center mt-3 fw-bold text-primary">Educations</h5>
							<hr class="mb-0">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Institute</th>
										<th scope="col">Degree</th>
										<th scope="col">Year</th>
										<th scope="col" class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row">1</td>
										<td><span>University of Football</span></td>
										<td><span>Football Coach</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">1</td>
										<td><span>University of Football</span></td>
										<td><span>Football Coach</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">1</td>
										<td><span>University of Football</span></td>
										<td><span>Football Coach</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
									<tr>
										<td scope="row">1</td>
										<td><span>University of Football</span></td>
										<td><span>Football Coach</span></td>
										<td><span>2018</span></td>
										<td class="action">
											<a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="#" class="delete"><i class="fa-solid fa-trash-can"></i></a>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="text-center mb-3">
								<a href="#" class="btn btn-theme btn-sm">View All</a>
							</div>
						</div>
					</div>
				</div>

				{{-- VIDEOS --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="videos">
					<i class="bi bi-camera-video"></i>
					<span>My Videos</span>
				</h2>
				<div class="card p-3 videos">
					<div class="card-body">
						<form action="#">
							<div class="row">
								<div class="col-12 mb-3">
									<label for="videoTitle" class="col-form-label">Video Title</label>
	                                <input id="videoTitle" type="text" class="form-control @error('videoTitle') is-invalid @enderror" placeholder="Instituation Name">
	                                @error('videoTitle')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12 mb-3">
									<label for="videoLink" class="col-form-label">Video Link / URL</label>
	                                <input id="videoLink" type="text" class="form-control @error('videoLink') is-invalid @enderror" placeholder="Degree Title">
	                                @error('videoLink')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12 text-end">
									<button type="submit" class="btn btn-theme">
										Save
									</button>
								</div>
							</div>
						</form>

						<hr>

						<div class="row videos">
							<div class="col-12">
								<h5 class="fw-bold mb-3">Videos</h5>
							</div>
	                        <div class="col-md-6">
	                            <div class="video">
	                                <iframe width="100%" height="270" src="https://www.youtube.com/embed/06C-XxqYXT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="video">
	                                <iframe width="100%" height="270" src="https://www.youtube.com/embed/06C-XxqYXT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="text-center mt-4">
							<a href="#" class="btn btn-theme btn-sm">View All</a>
						</div>
					</div>
				</div>

				{{-- SESSIONS --}}
				{{-- <h2 class="mb-3 mt-5 text-center fs-2" id="sessions">
					<i class="bi bi-film"></i>
					<span>My Sessions</span>
				</h2>
				<div class="card p-3 sessions">
					<div class="card-head">
					</div>
				</div> --}}
			</div>
		</div>
	</div>

@endsection

@push('custom-scripts')
	
	<script>
		
		$('.personal-dropzone-wrapper').on('dragover', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).addClass('dragover');
        });

        $('.personal-dropzone-wrapper').on('dragleave', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass('dragover');
        });

	</script>

@endpush