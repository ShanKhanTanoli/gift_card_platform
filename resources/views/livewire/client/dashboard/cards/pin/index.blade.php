<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Card Status-->
        @include('livewire.client.dashboard.cards.partials.card-status')
        <!--Begin::Card Status-->
    </div>
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include('livewire.client.dashboard.cards.partials.tab-menu')
        <!--Begin::Sidebar-->
        <div class="col-lg-9 mt-lg-0">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    Pin Code
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form wire:submit.prevent='Update'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-switch">
                                                <input wire:model='enable_pin' class="form-check-input" type="checkbox"
                                                    id="enable_pin" checked="">
                                                <label
                                                    class="form-check-label @error('enable_pin') is-invalid @enderror"
                                                    for="enable_pin">
                                                    @if ($card->pin)
                                                        Disable Pin
                                                    @else
                                                        Enable Pin
                                                    @endif
                                                </label>
                                                @error('enable_pin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($enable_pin)
                                            <div class="col-md-12">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="pin">Pin Code (Max 5 Digits)</label>
                                                    <input type="text" wire:model.defer='pin'
                                                        value="{{ old('pin') }}"
                                                        class="form-control  @error('pin') is-invalid @enderror"
                                                        placeholder="Enter Pin">
                                                    @error('pin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                                <span wire:loading wire:target='Update' class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
                                                Save Changes
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
    </div>
</div>
