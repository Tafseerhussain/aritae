@extends('player.layouts.app')

@section('content')

<div class="playbook-page">
	
	{{-- PLAYBOOK HEADER --}}
	<div class="playbook-header">
		<div class="row">
			<div class="col-12 text-center text-white">
				<img src="{{ asset('assets/img/logo-white-vertical.svg') }}" alt="aritae logo">
				<h1 class="fw-lighter">
				ARITAE SELF LEADERSHIP ACADEMY
				</h1>
			</div>
		</div>
	</div>

	{{-- PLAYBOOK --}}
	<div class="playbook">
		<div class="row">
			<div class="col-xl-9 offset-xl-3 mb-4">
				<div class="module-completion">
					<small>You have completed 27% of <b>Aritae Modules</b></small>
					<div class="progress mt-1">
						<div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 27%;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
					</div>
				</div>
			</div>

			{{-- PLAYBOOK SIDEBAR --}}
			<div class="col-xl-3" style="height: 1000px;">
				<div class="playbook-sidebar sticky-top">
					<div class="head text-center text-white">
						<h5>Aritae Program Modules</h5>
					</div>
					<ul class="list-group rounded-0">
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/discovery.svg') }}" alt="icon"> Discovery
						</a>
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/action.svg') }}" alt="icon"> Focus
						</a>
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/focus.svg') }}" alt="icon"> Action
						</a>
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/strategy.svg') }}" alt="icon"> Strategy
						</a>
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/personal-plan.svg') }}" alt="icon"> Personal Plan
						</a>
					</ul>
				</div>
			</div>


			{{-- PLAYBOOK CONTENT --}}
			<div class="col-xl-9">
				<div class="playbook-content">
					<div class="content-hero text-center text-white">
						<div class="head bg-primary">
							<h4 class="m-0">MODULE - 1</h4>
						</div>
						<div class="body">
							<div class="img-box">
								<img src="{{ asset('assets/icons/discovery.svg') }}" alt="discovery">
							</div>
							<h2 class="fw-light text-uppercase">DISCOVERY</h2>
							<h2 class="text-uppercase">What's Your Story?</h2>
							<div class="quote">
								<p>“What is necessary to change a person, is to change his awareness of himself.”</p>
								<i class="fw-bold">— Benjamin Disraeli</i>
							</div>
						</div>
					</div>
					<div class="content-body">

						{{-- CONTENT DESC/IMG --}}
						<div class="row align-items-center">
							<div class="col-xl-7">
								<div class="content-desc">
									<h4 class="text-primary text-uppercase font-oswald">
										Summary
									</h4>
									<p>
										Who are you? What are you really about? These are not questions you’re faced with answering on a daily basis, but they’re absolutely crucial to your success in this program. Think of yourself as the hero in your own personal story. You can’t write a story about a character you don’t fully understand, right? So, let’s get to know you.
									</p>
									<h4 class="text-primary text-uppercase font-oswald">
										Objective
									</h4>
									<p>
										To quiet all of the outside voices and explore who you are and what you’re all about.
									</p>
									<h4 class="text-primary text-uppercase font-oswald">
										Task
									</h4>
									<p>
										Identify your personal interests, responsibilities, priorities, challenges, issues, values, convictions, needs, wants, dreams, as well as your most inspirational memories. Reflecting honestly in this way will help you achieve a deeper sense of self-awareness and uncover what is real in your heart. You will come to understand the importance of living with integrity and the power it will have in propelling you toward reaching your potential.
									</p>
								</div>
							</div>
							<div class="col-xl-5">
								<img src="{{ asset('assets/img/playbook/discovery-img.png') }}" alt="discovery">
							</div>
						</div>

						{{-- FORM COMPLETION PROGRESS --}}
						<div class="row form-completion-progress align-items-end">
							<div class="col-md-6">
								<h5 class="text-primary font-oswald text-uppercase m-0">Module # 1</h5>
							</div>
							<div class="col-md-6">
								<div class="form-completion">
									<small>Your <b>Form</b> is 27% Completed.</small>
									<div class="progress mt-1">
										<div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 27%;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
									</div>
								</div>
							</div>
						</div>

						{{-- MODULES FORM --}}
						<div class="row modules-form">
							<div class="col-12">
								<div class="card p-md-4 p-3 position-relative">
									<div class="card-ribbon">
										<img src="{{ asset('assets/img/playbook/form-ribbon.svg') }}" class="bg" alt="ribbon">
										<div class="ribbon-content text-center text-white">
											<img src="{{ asset('assets/icons/discovery.svg') }}" class="icon" alt="discovery">
											<h6 class="text-uppercase font-oswald fw-light">discovery</h6>
										</div>
									</div>
									<div class="card-head text-center">
										<div class="head text-uppercase font-oswald text-primary">
											<h5 class="fw-light">Playsheet #1</h5>
											<h4>Interests & Activities</h4>
										</div>
										<p>
											Make a list of things that interest you in the various areas of your life. Think deeply and try to identify interests you may have long since forgotten. Examples for home could be: playing with my siblings, video games, reading, spending time with Mom and/or Dad, etc.
										</p>
									</div>
									<div class="card-body p-0">
										<form action="#" class="form">
											<div class="form-group mb-3">
												<label for="" class="mb-1">Home</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group mb-3">
												<label for="" class="mb-1">School</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group mb-3">
												<label for="" class="mb-1">Arts, music, athletics, etc.</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group mb-3">
												<label for="" class="mb-1">Other (work, social settings, etc.)</label>
												<input type="text" class="form-control">
											</div>
											<div class="dots text-center">
											  	<span class="dot complete"></span>
											  	<span class="dot active"></span>
											  	<span class="dot"></span>
											  	<span class="dot"></span>
											</div>
											<div class="form-group text-end">
												<a href="#!" class="btn btn-light border">
													Previous
												</a>
												<a href="#!" target="_blank" class="btn icon-right-full btn-dark border-0">
						                            <span>Save & Next</span>
						                            <i class="bi bi-arrow-right-circle-fill"></i>
						                        </a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection