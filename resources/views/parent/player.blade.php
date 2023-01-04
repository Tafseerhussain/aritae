@extends('parent.layouts.app')

@section('content')

	<div class="profile-edit-page">
		<div class="row">
			<div class="col-xxl-9 col-xl-10 mx-auto">

				{{-- PLAYER --}}
				<h2 class="mb-3 text-center fs-2" id="info">
					<i class="bi bi-people"></i>
					<span>Players</span>
				</h2>
				@livewire('parent.player')
			</div>
		</div>
	</div>

@endsection

@push('custom-scripts')

@endpush