@extends('admin.layouts.app')

@section('content')

	<div class="row messages-page">
		<div class="col-12">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="chat-tab-pane" role="tabpanel" aria-labelledby="chat-tab" tabindex="0">
					@livewire('admin.sports')
				</div>
			</div>
		</div>
	</div>

@endsection