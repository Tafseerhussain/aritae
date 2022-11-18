@extends('coach.layouts.app')

@section('content')

	<div class="profile-edit-page">
		<div class="row">
			<div class="col-12 text-center">
				<h2>Personal Info</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 mx-auto">
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
								<div class="col-12">
									<button type="submit" class="btn btn-theme">
										Save
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection