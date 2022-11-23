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
				@livewire('coach.profile.coaching-experience')

				{{-- CERTIFICATIONS --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="certifications">
					<i class="bi bi-patch-check"></i>
					<span>Certifications</span>
				</h2>
				@livewire('coach.profile.certification')

				{{-- EDUCATIONS --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="education">
					<i class="bi bi-mortarboard"></i>
					<span>Education</span>
				</h2>
				@livewire('coach.profile.education')

				{{-- VIDEOS --}}
				<h2 class="mb-3 mt-5 text-center fs-2" id="videos">
					<i class="bi bi-camera-video"></i>
					<span>My Videos</span>
				</h2>
				@livewire('coach.profile.videos')

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