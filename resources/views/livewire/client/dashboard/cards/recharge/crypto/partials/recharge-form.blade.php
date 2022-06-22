<div class="col-12 mt-3">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">
                    Recharge Card
                </h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="container">
                <form wire:submit.prevent='Recharge'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
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
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="card_number">Card Number</label>
                                <input type="text" wire:model.defer='card_number' value="{{ old('card_number') }}"
                                    class="form-control  @error('card_number') is-invalid @enderror"
                                    placeholder="Enter Card Number">
                                @error('card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
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
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
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
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="balance">Balance Amount
                                    ({{ strtoupper(Business::Currency(Auth::user()->id)) }})</label>
                                <input type="text" wire:model.defer='balance' value="{{ old('balance') }}"
                                    class="form-control  @error('balance') is-invalid @enderror"
                                    placeholder="Enter Balance Amount ({{ strtoupper(Business::Currency(Auth::user()->id)) }})">
                                @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span>
                                Pay with Crypto
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
