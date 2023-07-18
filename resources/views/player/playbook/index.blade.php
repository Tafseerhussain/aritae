@extends('player.layouts.app')

@section('content')

<div class="playbook-page">
	
	{{-- PLAYBOOK HEADER --}}
	<div class="playbook-main">
		<div class="row">
			<div class="col-12 text-center text-white position-relative">
				<img src="{{ asset('assets/img/playbook/playbook-main.png') }}" class="w-100" alt="playbook">
				<div class="main-text">
					<h1>PERSONAL PLAYBOOK</h1>
					<p>This playbook belongs to...</p>
				</div>
			</div>
		</div>
	</div>

	{{-- PLAYBOOK QUUOTE --}}
	<div class="playbook-quote">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto col-lg-10 text-center">
					<h4>“Aritae Academy believes you have to learn to lead yourself before you can lead others.”</h4>
					<h6>—Jerry Morrissey</h6>
					<p>Founder of Aritae Self-Leadership Academy (ASLA)</p>
				</div>
			</div>
		</div>
	</div>

	{{-- PLAYBOOK ASLA --}}
	<div class="playbook-asla">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="text-primary text-uppercase mb-3">Welcome to Aritae Self-Leadership Academy (ASLA)</h2>
					<p>
						This program is designed to help you find the clarity, focus and power needed to reach your potential, become a leader, and live a life filled with love, happiness, significance, and success. You have joined a unique group of individuals driven to move out of their comfort zones and look within to become their best selves. Over the coming weeks, with the guidance and support of your Aritae Self-Leadership Coach, you will create the framework for your future. This is an exciting time and a big commitment, so get ready to dig deep and play hard.
					</p>
				</div>
			</div>
			<div class="row four-tenets g-md-5">
				<div class="col-12 text-center">
					<div class="four-tenets-head">The Four Tenets of the Aritae Academy</div>
					<p>A cycle of Love, Happiness, Significance, and Success.</p>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="tenet-circle love">
						<img src="{{ asset('assets/img/playbook/tenet-circle.svg') }}" alt="circle" class="tenet-border">
						<img src="{{ asset('assets/img/playbook/right-arrow.svg') }}" alt="arrow" class="tenet-arrow">
						<div class="tenet-text">
							<span>We believe we can all be winners in life if we begin the game of life looking within ourselves to determine what is in our heart and what we feel is most important to us.</span>
						</div>
						<div class="tenet-num">1</div>
						<div class="tenet-content text-center">
							<img src="{{ asset('assets/icons/love.svg') }}" alt="love"><br>
							<span>LOVE</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="tenet-circle happiness">
						<img src="{{ asset('assets/img/playbook/tenet-circle.svg') }}" alt="circle" class="tenet-border">
						<img src="{{ asset('assets/img/playbook/right-arrow.svg') }}" alt="arrow" class="tenet-arrow">
						<div class="tenet-text">
							<span>When we look inside our hearts, we will be destined to live a purposeful life; one filled with happiness.</span>
						</div>
						<div class="tenet-num">2</div>
						<div class="tenet-content text-center">
							<img src="{{ asset('assets/icons/happiness.svg') }}" alt="happiness"><br>
							<span>HAPPINESS</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="tenet-circle significance">
						<img src="{{ asset('assets/img/playbook/tenet-circle.svg') }}" alt="circle" class="tenet-border">
						<img src="{{ asset('assets/img/playbook/right-arrow.svg') }}" alt="arrow" class="tenet-arrow">
						<div class="tenet-text">
							<span>By living a life filled with love and happiness, our hearts will be filled with a sense of purpose, pride and joy (significance).</span>
						</div>
						<div class="tenet-num">3</div>
						<div class="tenet-content text-center">
							<img src="{{ asset('assets/icons/significance.svg') }}" alt="significance"><br>
							<span>SIGNIFICANCE</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="tenet-circle success">
						<img src="{{ asset('assets/img/playbook/tenet-circle.svg') }}" alt="circle" class="tenet-border">
						<img src="{{ asset('assets/img/playbook/right-arrow.svg') }}" alt="arrow" class="tenet-arrow">
						<div class="tenet-text">
							<span>If we play the game leading from our heart , which in turn gives us a sense of purpose, we will feel an amazing sense of pride and joy . We then are prepared to make self-determined plans that will lead us to achieving our goals and dreams .</span>
						</div>
						<div class="tenet-num">4</div>
						<div class="tenet-content text-center">
							<img src="{{ asset('assets/icons/success.svg') }}" alt="success"><br>
							<span>SUCCESS</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	{{-- PLAYBOOK MODULES --}}
	<div class="aritae-modules">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="modules-text">
						<p class="fw-semibold">
							THE ARITAE SELF-LEADERSHIP ACADEMY 
							UTILITIZES THE <span class="text-blue">5 MODULE ARITAE 
							SELF-LEADERSHIP PROGRAM</span> AND THE 
							ARITAE COACH TO GUIDE AND 
							INSPIRE EACH PLAYER TOWARD
							A LIFE FILLED WITH LOVE, 
							HAPPINESS, SIGNIFICANCE 
							AND SUCCESS.
						</p>
					</div>
				</div>
				<div class="col-md-8">
					<div class="modules-img">
						<img src="https://aritae.com/assets/img/academy/modules.svg" class="w-100" alt="modules">
					</div>
				</div>
			</div>
			<div class="module-boxes row text-center g-2">
				<div class="col-xl col-md-4">
					<div class="module-box">
						<img src="{{ asset('assets/img/playbook/module-curve.svg') }}" class="module-curve" alt="curve">
						<div class="module-box-meta">
							<div class="number">1</div>
							<img src="https://aritae.com/assets/img/academy/discovery.svg" alt="discovery">
							<h4 class="sec-color">DISCOVERY</h4>
							<p class="text-white">
								Deep thought and self-reflection about life are the foundation for all to come. The Player will be guided toward a deeper sense of self-awareness that helps them get in touch with what is real in their heart.
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl col-md-4">
					<div class="module-box">
						<img src="{{ asset('assets/img/playbook/module-curve.svg') }}" class="module-curve" alt="curve">
						<div class="module-box-meta">
							<div class="number">2</div>
							<img src="https://aritae.com/assets/img/academy/action.svg" alt="action">
							<h4 class="sec-color">FOCUS</h4>
							<p class="text-white">
								The Player will use what they discovered to formulate their vision and purpose of who they are today, what they want in the future, and a better understanding of their why
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl col-md-4">
					<div class="module-box">
						<img src="{{ asset('assets/img/playbook/module-curve.svg') }}" class="module-curve" alt="curve">
						<div class="module-box-meta">
							<div class="number">3</div>
							<img src="https://aritae.com/assets/img/academy/focus.svg" alt="focus">
							<h4 class="sec-color">ACTION</h4>
							<p class="text-white">
								The Player will formalize their set of goals that are in alignment with their stated purpose and vision.
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl col-md-4 offset-xl-0 offset-md-2">
					<div class="module-box">
						<img src="{{ asset('assets/img/playbook/module-curve.svg') }}" class="module-curve" alt="curve">
						<div class="module-box-meta">
							<div class="number">4</div>
							<img src="https://aritae.com/assets/img/academy/strategy.svg" alt="strategy">
							<h4 class="sec-color">STRATEGY</h4>
							<p class="text-white">
								The Player will design how they will accomplish each of their stated goals with ARITAE Microplans™.
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl col-md-4">
					<div class="module-box">
						<img src="{{ asset('assets/img/playbook/module-curve.svg') }}" class="module-curve" alt="curve">
						<div class="module-box-meta">
							<div class="number">5</div>
							<img src="https://aritae.com/assets/img/academy/personal-plan.svg" alt="personal plan">
							<h4 class="sec-color">PERSONAL PLAN</h4>
							<p class="text-white">
								The Player will organize the information they discovered and work with their coach to create their Personal Plan to accomplish their goals and find love, happiness, significance and success.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</div>

@endsection