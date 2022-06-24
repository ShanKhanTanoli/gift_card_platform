<div class="container-fluid">
    <!--Begin::Alerts-->
    @include('errors.alerts')
    <!--End::Alerts-->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Card Pin
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form wire:submit.prevent='Pin'>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="pin">Pin Code</label>
                                        <input type="password" wire:model.defer='pin' value="{{ old('pin') }}"
                                            class="form-control  @error('pin') is-invalid @enderror"
                                            placeholder="Enter Pin Code">
                                        @error('pin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                        <span wire:loading wire:target='Pin' class="spinner-border spinner-border-sm"
                                            role="status" aria-hidden="true"></span>
                                        Validate
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    @if ($card->pin)
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#RemovePinModal">
                                            <i class="fas fa-lock-open text-sm me-2">
                                            </i>
                                            Remove Pin

                                        </a>
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#ChangePinModal">
                                            <i class="fas fa-key text-sm me-2">
                                            </i>
                                            Change Pin
                                        </a>
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#ForgotPinModal">
                                            <i class="fas fa-lock text-sm me-2">
                                            </i>
                                            Forgot Pin
                                        </a>
                                    @else
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#AddPinModal">
                                            <i class="fas fa-edit text-sm me-2">
                                            </i>
                                            Add Pin
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Begin::Add Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.add-pin-modal')
    <!--End::Add Pin Modal-->

    <!--Begin::Remove Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.remove-pin-modal')
    <!--End::Remove Pin Modal-->

    <!--Begin::Change Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.change-pin-modal')
    <!--End::Change Pin Modal-->

    <!--Begin::Forgot Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.forgot-pin-modal')
    <!--End::Forgot Pin Modal-->

</div>
