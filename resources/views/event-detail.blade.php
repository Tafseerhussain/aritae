@extends('layouts.app')

@section('content')
    
    @livewire('event.event-detail-page', ['event' => $event])

@endsection