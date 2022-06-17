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
                                    Accessibility
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form wire:submit.prevent='Update'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-switch">
                                                <input wire:model.defer='activate' class="form-check-input"
                                                    type="checkbox" id="activate" checked="">
                                                <label class="form-check-label @error('activate') is-invalid @enderror"
                                                    for="activate">
                                                    @if ($card->isActive())
                                                        Deactivate Card
                                                    @else
                                                        Activate Card
                                                    @endif
                                                </label>
                                                @error('activate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                                <span wire:loading class="spinner-border spinner-border-sm"
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
