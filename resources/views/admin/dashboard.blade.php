@extends('admin.layouts.app')

@section('content')

    <div class="dashboard-base">
        <div class="cover-img">
            <h1>
                No Cover Photo Added
            </h1>
            <p>
                Aritae gives you every college program and coach in the country. Get started now!
            </p>
            <a href="#" class="btn btn-theme">
                Upload Cover Photo
            </a>
        </div>
        <div class="profile-bar">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="left">
                        <div class="d-flex">
                        <img src="{{ asset('assets/img/players/1.jpg') }}" alt="">
                        <p>
                            <b>John Doe</b>
                            <span>
                                Football Coach
                            </span>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right text-end">
                        <div class="">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="ms-1">
                                <strong>Joined: </strong> 20 Sep, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
