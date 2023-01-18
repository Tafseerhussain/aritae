@extends('player.layouts.app')

@section('content')
	@livewire('player.payment', ['amount' => $amount, 'event_id' => $event_id, 'redirect_url' => $redirect_url])
@endsection