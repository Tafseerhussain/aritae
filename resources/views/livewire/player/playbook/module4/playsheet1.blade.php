<div class="row modules-form">
    <div class="col-12">
        <div class="card p-md-4 p-3 position-relative">
            <div class="card-ribbon">
                <img src="{{ asset('assets/img/playbook/form-ribbon-module4.svg') }}" class="bg" alt="ribbon">
                <div class="ribbon-content text-center text-white">
                    <img src="{{ asset('assets/icons/strategy.svg') }}" class="icon" alt="discovery">
                    <h6 class="text-uppercase font-oswald fw-light">Strategy</h6>
                </div>
            </div>
            <div class="card-head text-center">
                <div class="head text-uppercase font-oswald text-primary">
                    <h5 class="fw-light">Playsheet #{{$playsheet}}</h5>
                    <h4>MICROPLANS</h4>
                </div>
                <p></p>
            </div>
            <div class="card-body p-0">
                <form action="#" class="form">
                    <table class="strategy-list">
                        <tbody>
                            <tr>
                                <td><i class="bi bi-check-circle-fill"></i></td>
                                <td>In each Goal box, write a goal from Module #3.</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-check-circle-fill"></i></td>
                                <td>In each Action box, write one action you feel will help you achieve your established goal.</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-check-circle-fill"></i></td>
                                <td>In each Obstacle box, write one obstacle you feel would potentially block you from achieving your desired goal.</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-check-circle-fill"></i></td>
                                <td>In each Solution box, write one solution that would allow you to move past the obstacle written in the previous box.</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-check-circle-fill"></i></td>
                                <td>In each Reward box, write the reward you will receive for achieving your goal. To determine this, it’s helpful to think about the reasons why you want to accomplish this specific goal.</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="row">
                        <div class="col-12 strategy-quote">
                            <h2>
                                “A clear vision, backed by definite plans, gives you a tremendous feeling of confidence and personal power.”
                            </h2>
                            <span>—Brian Tracy</span>
                        </div>
                    </div>

                    <div class="dots text-center">
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
                    </div>
                    <div class="form-group text-end">
                        <a href="{{route('player.playbook.module3', ['id' => $playbook_id])}}" class="btn btn-light border">
                            Previous
                        </a>
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
