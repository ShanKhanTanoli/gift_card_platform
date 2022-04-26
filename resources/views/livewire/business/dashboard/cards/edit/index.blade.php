<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex">
                            <div class="col">
                                <h6 class="text-white text-capitalize ps-3">
                                    Update Card
                                </h6>
                            </div>
                            <div class="col">
                                <button style="float:right;margin-right:1rem !important;" type="button"
                                    class="btn btn-sm btn-dark ps-3" data-bs-toggle="modal" data-bs-target="#AddType">
                                    Add Card Type
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="price">Price
                                            ({{ strtoupper(Business::Currency(Auth::user()->id)) }})</label>
                                        <input type="text" wire:model.defer='price' value="{{ old('price') }}"
                                            class="form-control  @error('price') is-invalid @enderror"
                                            placeholder="Enter Price ({{ strtoupper(Business::Currency(Auth::user()->id)) }})">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="expires_at">Expiry Date</label>
                                        <input type="date" wire:model.defer='expires_at'
                                            value="{{ old('expires_at') }}"
                                            class="form-control  @error('expires_at') is-invalid @enderror"
                                            placeholder="Enter Expiry Date">
                                        @error('expires_at')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="metadata">Description</label>
                                        <input type="metadata" wire:model.defer='metadata'
                                            value="{{ old('metadata') }}"
                                            class="form-control  @error('metadata') is-invalid @enderror"
                                            placeholder="Enter description">
                                        @error('metadata')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" wire:attr='disabled'
                                        wire:click='Update'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
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
    <!--Begin::Add Card Type-->
    <div wire:ignore.self class="modal fade" id="AddType" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                        Add Type
                    </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::Add Card Type-->
</div>
