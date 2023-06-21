@extends('layouts.app')

@section('content')
    
    <div class="players-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>OUR PLAYERS</h1>
                    <p>
                        Browse our curated list of top quality players to find the perfect match for you
                    </p>
                    <p class="points">
                        CLARITY <img src="{{ asset('assets/img/dot.svg') }}" alt="">
                        FOCUS <img src="{{ asset('assets/img/dot.svg') }}" alt="">
                        POWER
                    </p>
                </div>
            </div>
        </div>
    </div>

    @livewire('player.all-players')

@endsection

@push('custom-scripts')

    <script>
        if($(window).width() <= 575) {
            $('.users-search-sort-area .filter-button').on('click', function() {
                $('.all-users .filter-cards .filters').css({
                    'right': '0',
                })
            })
        } else {
              $('.users-search-sort-area .filter-button').on('click', function() {
                $('.all-users .filter-cards .filters').css({
                    'right': '5%',
                })
            })
        }
        
        $('.all-users .filters .close-filter').on('click', function() {
            $('.all-users .filter-cards .filters').css({
                'right': '-100%',
            })
        })
    </script>

@endpush
