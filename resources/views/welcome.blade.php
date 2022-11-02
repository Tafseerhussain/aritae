@extends('layouts.app')

@section('content')
    
    <div class="coaches-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>OUR COACHES</h1>
                    <p>
                        Browse our curated list of top quality coaches to find the perfect match for you
                    </p>
                    <p class="points">
                        INSPIRE <img src="{{ asset('assets/img/dot.svg') }}" alt="">
                        LEAD <img src="{{ asset('assets/img/dot.svg') }}" alt="">
                        TRANSFORM
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="all-coaches">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    filter
                </div>
                <div class="col-md-8">
                    cards
                </div>
            </div>
        </div>
    </div>

@endsection
