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
	<div class="playbook module2">
		<div class="row">
			<div class="col-xl-9 offset-xl-3 mb-4">
				<div class="module-completion">
					<small>You have completed {{$completeness}}% of <b>Aritae Modules</b></small>
					<div class="progress mt-1">
						<div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: {{$completeness}}%;" aria-valuenow="{{$completeness}}" aria-valuemin="0" aria-valuemax="100">{{$completeness}}%</div>
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
						<a href="{{route('player.playbook.module1', ['id' => $id])}}" class="list-group-item {{Route::is('player.playbook.module1', ['id' => $id]) ? 'active' : ''}}">
							<img src="{{ asset('assets/icons/discovery.svg') }}" alt="icon"> Discovery
						</a>
						<a href="{{route('player.playbook.module2', ['id' => $id])}}" class="list-group-item {{Route::is('player.playbook.module2', ['id' => $id]) ? 'active' : ''}}">
							<img src="{{ asset('assets/icons/focus.svg') }}" alt="icon"> Focus
						</a>
						<a href="{{route('player.playbook.module3', ['id' => $id])}}" class="list-group-item {{Route::is('player.playbook.module3', ['id' => $id]) ? 'active' : ''}}">
							<img src="{{ asset('assets/icons/action.svg') }}" alt="icon"> Action
						</a>
						<a href="{{route('player.playbook.module4', ['id' => $id])}}" class="list-group-item {{Route::is('player.playbook.module4', ['id' => $id]) ? 'active' : ''}}">
							<img src="{{ asset('assets/icons/strategy.svg') }}" alt="icon"> Strategy
						</a>
						<a href="{{route('player.playbook.module5', ['id' => $id])}}" class="list-group-item {{Route::is('player.playbook.module5', ['id' => $id]) ? 'active' : ''}}">
							<img src="{{ asset('assets/icons/personal-plan.svg') }}" alt="icon"> Personal Plan
						</a>
					</ul>
				</div>
			</div>


			{{-- PLAYBOOK CONTENT --}}
			<div class="col-xl-9">
				<div class="playbook-content">
					<div class="content-hero text-center text-white">
						<div class="head">
							<h4 class="m-0">MODULE - 2</h4>
						</div>
						<div class="body">
							<div class="img-box">
								<img src="{{ asset('assets/icons/focus.svg') }}" alt="discovery">
							</div>
							<h2 class="fw-light text-uppercase">Focus</h2>
							<h2 class="text-uppercase">WHY ARE YOU DOING ALL THIS?</h2>
							<div class="quote">
								<p>“The greatest good you could do for another is not just to share your riches, but to reveal to him his own.”</p>
								<i class="fw-bold">—Benjamin Disraeli</i>
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
										Chances are, you discovered a lot about yourself in Module 1 that you may not have realized. Now that you’ve gained clarity and explored various aspects of your past, present, and future, you’re going to focus on turning those ideas into a clear purpose and vision for the future. This is a crucial step in the Aritae process.
									</p>
									<h4 class="text-primary text-uppercase font-oswald">
										Objective
									</h4>
									<p>
										Develop a clear articulation of who you are today, what you want in the future, and why you want what you want.
									</p>
									<h4 class="text-primary text-uppercase font-oswald">
										Task
									</h4>
									<p>
										Create a Purpose and Vision Statement to guide your path to living a life filled with Love, Happiness, Significance, and Success.
									</p>
								</div>
							</div>
							<div class="col-xl-5">
								<img src="{{ asset('assets/img/playbook/focus-img.png') }}" alt="discovery">
							</div>
						</div>

						{{-- FORM COMPLETION PROGRESS AND MODULE 2 FORMS --}}
						@livewire('player.playbook.module2.main', ['playbook_id' => $id])

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