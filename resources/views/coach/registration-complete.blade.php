@extends('layouts.registration-app')

@section('content')
    
    <div class="coach-participation-page pb-5">
        <nav>
            <div class="container">
                <div class="row py-5 align-items-center">
                    <div class="col-md-9 text-md-start text-center">
                        <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo.svg') }}" alt="logo"></a>
                        <h2 class="text-primary fw-light my-4">ARITAE SELF LEADERSHIP ACADEMY</h2>
                    </div>
                    <div class="col-md-3 text-md-end text-center">
                        <a href="{{ route('coach.dashboard') }}" class="btn btn-theme">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span> Return To Dashboard</span>
                        </a>
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
                                <h6 class="text-uppercase text-blue titilium">
                                    COMPLETE
                                </h6>
                            </div>
                            <h6 class="text-uppercase text-blue titilium heading my-4 position-relative">
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
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>My friends and/or family have been coming to me for advice and guidance for years</p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
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
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I enjoy helping people feel loved, happy, and significant </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
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
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I enjoy working with people and helping them feel successful </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 4 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        4
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I feel a sense of satisfaction when I help others become better people </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 5 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        5
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I am excited and passionate about life </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 6 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        6
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I value honesty and integrity </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 7 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        7
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I have leadership qualities that I could utilize to be an ARITAE Self-Leadership Coach </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 8 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        8
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I have worked with people in the past helping them achieve and/or learn something </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 9 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        9
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I love to laugh and be happy </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 10 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        10
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I love to help others feel great about themselves </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 11 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        11
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I have self-confidence </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 12 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        12
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I am motivated to work on improving myself </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
                                                <option value='' disabled selected>--Select Option--</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Question 13 --}}
                        <div class="row question-box">
                            <div class="col-1">
                                <div class="position-relative h-100 number-line">
                                    <div class="border mx-auto"></div>
                                    <div class="number">
                                        13
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="question">
                                    <img src="{{ asset('assets/img/polygon-before.svg') }}" class="before" alt="triangle">
                                    <img src="{{ asset('assets/img/polygon-after.svg') }}" class="before after" alt="triangle">
                                    <div class="row align-items-center">
                                        <div class="col-md-9">
                                            <p>I have the desire/determination to become an ARITAE Self-Leadership Coach? </p> 
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <select class="form-select form-control w-100 @error('startingMonth') is-invalid @enderror" aria-label="Default select example" wire:model.defer="startingMonth">
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
        </div>
    </div>

@endsection
