<div>
    <div class="container">
        <div class="row">
            <div class="col-12 p-2">
                <form method="POST" wire:submit.prevent="submitPayment">
                    <div class="card payment">
                        <div class="card-body">
                            <h2 class="mb-5">Payment: ${{$amount}} USD</h2>
                            <div class="row">
                                <div class="col-lg-4 payment-method-selection">
                                    <h5>Choose your payment method</h5>
                                    <div class="mt-4">
                                        <div class="form-check mt-3">
                                            <input wire:model="payment_method" value="card" class="form-check-input mt-2" type="radio" name="payment_method" id="payment-method-card" {{($payment_method == 'card') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="payment-method-card">
                                                <img src="{{asset('assets/img/card.png')}}" height="30">
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input wire:model="payment_method" value="apple-pay" class="form-check-input mt-2" type="radio" name="payment_method" id="payment-method-apple" {{($payment_method == 'apple-pay') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="payment-method-apple">
                                                <img src="{{asset('assets/img/apple-pay.png')}}" height="30">
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input wire:model="payment_method" value="google-pay" class="form-check-input mt-2" type="radio" name="payment_method" id="payment-method-google" {{($payment_method == 'google-pay') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="payment-method-google">
                                                <img src="{{asset('assets/img/google-pay.png')}}" height="30">
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input wire:model="payment_method" value="paypal" class="form-check-input mt-2" type="radio" name="payment_method" id="payment-method-paypal" {{($payment_method == 'paypal') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="payment-method-paypal">
                                                <img src="{{asset('assets/img/paypal.png')}}" height="30">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    @if($payment_method == 'card')
                                    <h5>Add your card deails</h5>
                                    <div class="row mb-2">
                                        <div class="col-12 mb-2">
                                            <label for="card-name" class="col-form-label">{{ __('Name on Card') }}</label>
                                            <input id="card-name" type="text" class="form-control @error('card_name') is-invalid @enderror" placeholder="Mike" autofocus wire:model="card_name">

                                            @error('card_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="card-number" class="col-form-label">{{ __('Card Number') }}</label>
                                            <input id="card-number" type="text" class="form-control @error('card_number') is-invalid @enderror" wire:model="card_number">

                                            @error('card_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="card-date" class="col-form-label">{{ __('Expire Date') }}</label>
                                            <input id="card-number" type="text" class="form-control @error('card_date') is-invalid @enderror" placeholder="MM / YY" wire:model="card_date">

                                            @error('card_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="card-cvv" class="col-form-label">{{ __('CVV') }}</label>
                                            <input id="card-cvv" type="text" class="form-control @error('card_cvv') is-invalid @enderror" placeholder="123" wire:model="card_cvv">

                                            @error('card_cvv')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-between w-100 my-3">
                    <p class="text-secondary"><em>*By providing your card information, you allow Aritae to charge your card for future payments in accordance with their terms</em></p>
                    <button type="submit" class="btn btn-theme">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
