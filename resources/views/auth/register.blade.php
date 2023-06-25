@extends('layouts.registration-app')

@section('content')
    
    @livewire('auth.registration', ['email' => request()->get('email')])

@endsection
