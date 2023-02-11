@extends('admin.layouts.app')

@section('content')

	<div class="profile-edit-page">
		<div class="row">
			<div class="col-xxl-9 col-xl-10 mx-auto">

				{{-- PERSONAL INFO --}}
				<h2 class="mb-3 text-center fs-2" id="info">
					<i class="bi bi-info-circle"></i>
					<span>Personal Info</span>
				</h2>
				@livewire('admin.profile.personal-information')
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