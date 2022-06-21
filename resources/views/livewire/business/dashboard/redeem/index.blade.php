<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Redeem
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form wire:submit.prevent='Redeem'>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3 input-lg">
                                        <label for="code">Enter Code</label>
                                        <input type="text" wire:model.defer='code' value="{{ old('code') }}"
                                            class="form-control  @error('code') is-invalid @enderror"
                                            placeholder="Enter Code">
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if($pin)
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3 input-lg">
                                        <label for="pin">Pin Code</label>
                                        <input type="text" wire:model.defer='pin' value="{{ old('pin') }}"
                                            class="form-control  @error('pin') is-invalid @enderror"
                                            placeholder="Enter Pin Code">
                                        @error('pin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Redeem
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
