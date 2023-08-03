@extends('admin.layouts.app')

@section('content')
    @livewire('admin.playbook.main', ['coach_id'=>$coach_id])
@endsection
