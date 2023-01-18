@extends('player.layouts.app')

@section('content')
	@livewire('player.payment', ['amount' => $amount])
@endsection