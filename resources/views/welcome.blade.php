@extends('layouts.app')

@section('content')

    {{-- <div class="coaches-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Welcome To Aritae</h1>
                    <p>
                        Browse our curated list of top quality coaches and players to find the perfect match for you
                    </p>
                    <p class="points">
                        INSPIRE <img src="{{ asset('assets/img/dot.svg') }}" alt="">
                        LEAD <img src="{{ asset('assets/img/dot.svg') }}" alt="">
                        TRANSFORM
                    </p>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="register-page pt-5">
        <div class="get-started pt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-head text-center">
                            <h2>
                                Who are you looking for
                            </h2>
                            <p class="my-4">
                                Find Coaches or Players
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-2">
                                    <a href="{{ route('all-players') }}" class="register-type" wire:click="changeStep(4)">
                                        <img src="{{ asset('assets/icons/player.svg') }}" alt="player">
                                        <h2>
                                            Find A Player
                                        </h2>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('all-coaches') }}" class="register-type" wire:click="changeStep(2)">
                                        <img src="{{ asset('assets/icons/coach.svg') }}" alt="player">
                                        <h2>
                                            Find A Coach
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection