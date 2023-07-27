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
			<div class="col-xl-3 playbook-sidebar-col position-relative">
				<div class="playbook-sidebar sticky-xl-top my-3 my-xl-0">
					<div class="head text-center text-white">
						<h5>Aritae Program Modules</h5>
					</div>
					<ul class="list-group rounded-0">
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/discovery.svg') }}" alt="icon"> Discovery
						</a>
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/focus.svg') }}" alt="icon"> Focus
						</a>
						<a href="#" class="list-group-item">
							<img src="{{ asset('assets/icons/action.svg') }}" alt="icon"> Action
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
						<div class="head bg-module5">
							<h4 class="m-0">MODULE - 5</h4>
						</div>
						<div class="body" style="background-image: url('{{asset('assets/img/playbook/personal-plan-bg.jpg')}}')">
							<div class="img-box">
								<img src="{{ asset('assets/icons/personal-plan.svg') }}" alt="discovery">
							</div>
							<h2 class="fw-light text-uppercase">Personal Plan</h2>
							<h2 class="text-uppercase">WHAT’S NEXT FOR ME?</h2>
							<div class="quote">
								<p>“You control your future, your destiny. What you think about, comes about. By recording your dreams and goals on paper, you set in motion the process of becoming the person you most want to be. Put your future in good hands—your own.”</p>
								<i class="fw-bold">—Mark Victor Hansen</i>
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
										This Module will give you the opportunity to create actionable goals based on what you learned during Module 2. Getting specific will enable you to determine which goals will best guide you toward a life filled with Love, Happiness, Significance, and Success.
									</p>
									<h4 class="text-primary text-uppercase font-oswald">
										Objective
									</h4>
									<p>
										Review and complete your Final Personal Plan.
									</p>
									<h4 class="text-primary text-uppercase font-oswald">
										Task
									</h4>
									<p>
										Review Modules 2-4, take the information, refine it if necessary, and fill out the Playsheets in Module 5.
									</p>
								</div>
							</div>
							<div class="col-xl-5">
								<img src="{{ asset('assets/img/playbook/personal-plan-img.png') }}" alt="Action">
							</div>
						</div>

						{{-- FORM COMPLETION PROGRESS AND MODULE 5 FORMS --}}
						@livewire('player.playbook.module4.main', ['playbook_id' => $id])

					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection

@push('custom-scripts')
	<script>
		// var fixmeTop = $('.playbook-sidebar').offset().top;

		// $(window).scroll(function() {

		//     var currentScroll = $(window).scrollTop();
		//     var new_width = $('.playbook-sidebar-col').width();
		//     if (currentScroll >= fixmeTop) {
		//         $('.playbook-sidebar').css({
		//             position: 'fixed',
		//             top: 10,
		//             width: new_width,
		//         });
		//     } else {
		//         $('.playbook-sidebar').css({
		//             position: 'static',
		//         });
		//     }

		// });
	</script>
@endpush