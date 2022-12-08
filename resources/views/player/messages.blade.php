@extends('player.layouts.app')

@section('content')

	<div class="row messages-page">
		<div class="col-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="chat-tab" data-bs-toggle="tab" data-bs-target="#chat-tab-pane" type="button" role="tab" aria-controls="chat-tab-pane" aria-selected="true">
						Chat
					</button>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="chat-tab-pane" role="tabpanel" aria-labelledby="chat-tab" tabindex="0">
					@livewire('chat.main')
				</div>
			</div>
		</div>
	</div>

@endsection