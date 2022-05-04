<section style="margin-top: 150px;" id="BuyCard" class="contact">
    <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="fade-up">
            <h2>Buy</h2>
            <p>Card</p>
        </div>
        <div class="row">
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <div class="info">
                    <div class="address">
                        <h4>Price:</h4>
                        <p>{{ $card->price }} {{ strtoupper(Business::Currency($card->user_id)) }}</p>
                    </div>
                    <div class="email">
                        <h4>Balance:</h4>
                        <p>{{ $card->balance }} {{ strtoupper(Business::Currency($card->user_id)) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    @if(Auth::user())
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="holder_name">Card Holder Name</label>
                            <input type="text" wire:model.defer='holder_name' value="{{ old('holder_name') }}"
                                class="form-control  @error('holder_name') is-invalid @enderror"
                                placeholder="Enter Card Holder Name">
                            @error('holder_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="holder_name">Card Holder Name</label>
                            <input type="text" wire:model.defer='card_number' value="{{ old('card_number') }}"
                                class="form-control  @error('card_number') is-invalid @enderror"
                                placeholder="Enter Card Number">
                            @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="card_expiry">Card Expiry</label>
                            <input type="date" wire:model.defer='card_expiry' value="{{ old('card_expiry') }}"
                                class="form-control  @error('card_expiry') is-invalid @enderror"
                                placeholder="Enter Card Expiry">
                            @error('card_expiry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="card_cvc">Card CVC</label>
                            <input type="text" wire:model.defer='card_cvc' value="{{ old('card_cvc') }}"
                                class="form-control  @error('card_cvc') is-invalid @enderror"
                                placeholder="Enter Card CVC">
                            @error('card_cvc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div>
                        @if(Auth::user())
                        <button type="button" class="btn btn-primary" wire:attr='disabled' wire:click='PayNow'>
                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            Pay Now
                        </button>
                        @else
                        <a class="btn-buy" href="{{ route('login') }}">
                            <strong>
                                Please Login to continue
                            </strong>
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
