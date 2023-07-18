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
				<div class="profile-completion">
					<small>You have completed 27% of <b>Aritae Modules</b></small>
					<div class="progress mt-1">
						<div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: 27%;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
					</div>
				</div>
			</div>

			{{-- PLAYBOOK SIDEBAR --}}
			<div class="col-xl-3 position-relative">
				<div class="playbook-sidebar">
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

		</div>
	</div>
</div>

@endsection