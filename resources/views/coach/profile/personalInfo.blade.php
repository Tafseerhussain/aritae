@extends('coach.layouts.app')

@section('content')

	<div class="profile-edit-page">
		<div class="row">
			<div class="col-md-8 mx-auto">
				{{-- PERSONAL INFO --}}
				<h2 class="mb-2 text-center" id="info">
					<i class="bi bi-info-circle"></i>
					<span>Personal Info</span>
				</h2>
				<div class="card p-3 profile-info">
					<div class="card-head">
						<div class="cover-image">
							<div class="changeImage">
								<i class="fa-solid fa-pencil"></i>
							</div>
							<img src="{{ asset('/assets/img/default/default-cover.jpg') }}" alt="cover image" class="w-100">
						</div>
						<div class="d-flex profile-meta-bar justify-content-between">
							<div class="profile-image">
								<div class="changeImage">
									<i class="fa-solid fa-pencil"></i>
								</div>
								<img src="{{ asset('assets/img/players/1.jpg') }}" class="rounded-circle w-100 shadow" alt="">
							</div>
							<div class="profile-completion text-end">
									<small>Your Profile is 25% complete</small>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="card-body">
						<form action="#">
							<div class="row">
								<div class="col-lg-6 mb-3">
									<label for="firstName" class="col-form-label">First Name</label>
	                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" value="{{ Auth::user()->first_name }}">
	                                @error('firstName')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-lg-6 mb-3">
									<label for="lastName" class="col-form-label">Last Name</label>
	                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ Auth::user()->last_name }}">
	                                @error('lastName')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-lg-6 mb-3">
									<label for="dateOfBirth" class="col-form-label">Date Of Birth</label>
	                                <input id="dateOfBirth" type="text" class="form-control @error('dateOfBirth') is-invalid @enderror" placeholder="09 Sep, 1994">
	                                @error('dateOfBirth')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-lg-6 mb-3">
									<label for="phoneNumber" class="col-form-label">Phone Number</label>
	                                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="+23 234 234">
	                                @error('phoneNumber')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12 mb-3">
									<label for="address" class="col-form-label">Home Address</label>
	                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Start typing your address...">
	                                @error('address')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12 mb-3">
									<label for="aboutMe" class="col-form-label">About Me</label>
									<textarea rows="3" class="form-control @error('aboutMe') is-invalid @enderror" placeholder="Start typing about yourself here..."></textarea>
	                                @error('aboutMe')
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
					</div>
				</div>

				{{-- COACHING EXPERINECE --}}
				<h2 class="mb-2 mt-5 text-center" id="experience">
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
					</div>
				</div>

				{{-- CERTIFICATIONS --}}
				<h2 class="mb-2 mt-5 text-center" id="certifications">
					<i class="bi bi-patch-check"></i>
					<span>Certifications</span>
				</h2>
				<div class="card p-3 certifications">
					<div class="card-head">
					</div>
				</div>

				{{-- EDUCATIONS --}}
				<h2 class="mb-2 mt-5 text-center" id="education">
					<i class="bi bi-mortarboard"></i>
					<span>Education</span>
				</h2>
				<div class="card p-3 education">
					<div class="card-head">
					</div>
				</div>

				{{-- VIDEOS --}}
				<h2 class="mb-2 mt-5 text-center" id="videos">
					<i class="bi bi-camera-video"></i>
					<span>My Videos</span>
				</h2>
				<div class="card p-3 videos">
					<div class="card-head">
					</div>
				</div>

				{{-- SESSIONS --}}
				<h2 class="mb-2 mt-5 text-center" id="sessions">
					<i class="bi bi-film"></i>
					<span>My Sessions</span>
				</h2>
				<div class="card p-3 sessions">
					<div class="card-head">
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection