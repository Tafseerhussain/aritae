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
	<div class="playbook module1">
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

						{{-- FORM COMPLETION PROGRESS AND MODULE 1 FORMS --}}
						@livewire('player.playbook.module1.main', ['playbook_id' => $id])

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