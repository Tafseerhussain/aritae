@extends('layouts.app')

@section('content')
    
    <div class="events-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>EVENTS</h1>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    @livewire('event.all-events')

@endsection