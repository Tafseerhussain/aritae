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

    @livewire('coach.all-coaches')

@endsection

@push('custom-scripts')
    
    <script>
        $(function () {
           // var $propertiesForm = $('.mall-category-filter');
           var $body = $('body');
           var experienceSlider = document.getElementById('experience-slider');
           var hourlySlider = document.getElementById('hourly-slider');

           noUiSlider.create(experienceSlider, {
               start: [1, 4],
               connect: true,
               tooltips: {
                to: function(numericValue) {
                    return numericValue.toFixed(0);
                }
               },
               range: {
                   min: 1,
                   max: 10
               },

           });

           noUiSlider.create(hourlySlider, {
               start: [10, 50],
               connect: true,
               tooltips: {
                to: function(numericValue) {
                    return numericValue.toFixed(0);
                }
               },
               range: {
                   min: 10,
                   max: 200
               },

           });
       })     
    </script>
@endpush