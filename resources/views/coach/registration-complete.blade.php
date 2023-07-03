@extends('layouts.registration-app')

@section('content')
    
    <div class="coach-participation-page pb-5">
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-12 py-5 text-center">
                        <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo.svg') }}" alt="logo"></a>
                        <h2 class="text-primary fw-light my-4">ARITAE SELF LEADERSHIP ACADEMY</h2>
                    </div>
                </div>
            </div>
        </nav>

        <div class="coach-participation-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" wire:loading>
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <h3 class="text-primary text-center titilium fw-semibold mb-3">
                            Coach Participation Form
                        </h3>
                    </div>

                    {{-- COMPLETION BOX --}}
                    <div class="col-1">
                        <div class="position-relative h-100 number-line">
                            <div class="border mx-auto"></div>
                            <div class="number">
                                <i class="fa-solid fa-question"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-11">
                        <div class="completion-box bg-primary text-white position-relative text-center">
                            <img src="{{ asset('assets/img/corner-dots.svg') }}" class="top-left-dots" alt="dots">
                            <img src="{{ asset('assets/img/corner-dots.svg') }}" class="bottom-right-dots" alt="dots">
                            <div class="completed position-relative">
                                <h2 class="fw-light">
                                    12%
                                </h2>
                                <h6 class="text-uppercase text-secondary titilium">
                                    COMPLETE
                                </h6>
                            </div>
                            <h6 class="text-uppercase text-secondary titilium heading my-4 position-relative">
                                YOUR PASSIONS
                            </h6>
                            <p class="position-relative">
                                This form is designed to help you dig a little deeper within your heart and better understand if you are prepared to become an ARITAE Coach for young people. Below you will find statements that will allow you and us to determine if you have the potential to be an ARITAE Self-Leadership Coach.
                            </p>
                            <a href="#continue" class="btn btn-light mt-4 position-relative">Continue</a>
                        </div>
                    </div>


                    {{-- FIRST BOX QUESTIONS --}}
                    <div class="col-12 first-box-questions">
                        <div class="row">
                            <div class="col-1">
                                <div class="position-relative h-100">
                                    <div class="border mx-auto"></div>
                                </div>
                            </div>
                            <div class="col-11">
                                <h5 class="text-primary titilium fw-semibold mt-5">
                                    On a Scale of 1 –10 how would you rank yourself in the following areas? (1- lowest and 10 – highest)
                                </h5>
                            </div>
                        </div>

                        {{-- Question 1 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        1
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <p>My friends and/or family have been coming to me for advice and guidance for years</p>
                                    <select class="form-select form-control w-50  @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                        <option value='' disabled selected>--Select Option--</option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Question 2 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        2
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <p>My friends and/or family have been coming to me for advice and guidance for years</p>
                                    <select class="form-select form-control w-50  @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                        <option value='' disabled selected>--Select Option--</option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Question 3 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        3
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <p>My friends and/or family have been coming to me for advice and guidance for years</p>
                                    <select class="form-select form-control w-50  @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                        <option value='' disabled selected>--Select Option--</option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
