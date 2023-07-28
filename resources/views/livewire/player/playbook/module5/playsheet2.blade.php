<div class="row modules-form">
    <div class="col-12">
        <div class="card p-md-4 p-3 position-relative">
            <div class="card-ribbon">
                <img src="{{ asset('assets/img/playbook/form-ribbon-module5.svg') }}" class="bg" alt="ribbon">
                <div class="ribbon-content text-center text-white">
                    <img src="{{ asset('assets/icons/personal-plan.svg') }}" class="icon" alt="discovery">
                    <h6 class="text-uppercase font-oswald fw-light">Personal Plan</h6>
                </div>
            </div>
            <div class="card-head text-center">
                <div class="head text-uppercase font-oswald text-primary">
                    <h5 class="fw-light">Playsheet #{{$playsheet}}</h5>
                    <h4>Personal Goals and Microplans</h4>
                </div>
                <p>
                    Please transfer all of the goals and Microplans you developed in Modules 3 and 4 to the blank goals and Microplans that follow. This will give you all of your goals and Microplans organized into a Final Personal Plan. You can review this Final Plan at any time in the future to reference your goals and how you are using the Microplans in your effort to execute them.
                </p>
            </div>
            <div class="card-body p-0">
                <form action="#" class="form">

                    <div class="row">
                        <div class="col-12 personal-plan-quote">
                            <h2>
                                “Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful.”
                            </h2>
                            <span>—Albert Schweitzer</span>
                        </div>
                    </div>

                    <div class="dots text-center">
                        <span class="dot complete"></span>
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                    <div class="form-group text-end">
                        <button type="button" class="btn btn-light border" wire:click="previous">
                            Previous
                        </button>
                        <button type="button" class="btn icon-right-full btn-dark border-0" wire:click="save">
                            <span>Save & Next</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
