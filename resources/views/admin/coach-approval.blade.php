@extends('admin.layouts.app')

@section('content')
    @if($coach_id)
        @livewire('admin.coach-approval.main', ['active_component' => 'details', 'coach_id' => $coach_id])
    @else
        @livewire('admin.coach-approval.main')
    @endif
@endsection
