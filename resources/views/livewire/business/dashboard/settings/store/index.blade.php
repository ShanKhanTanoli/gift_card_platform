<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include(
            'livewire.business.dashboard.settings.partials.sidebar'
        )
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
                                    Update Store
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="store_name">Store Name</label>
                                                <input type="text" wire:model.defer='store_name'
                                                    value="{{ old('store_name') }}"
                                                    class="form-control  @error('store_name') is-invalid @enderror"
                                                    placeholder="Enter Store Name">
                                                @error('store_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="store_description">Store Description</label>
                                                <textarea wire:model.defer='store_description' placeholder="Enter Store Description"
                                                    class="form-control  @error('store_description') is-invalid @enderror"
                                                    rows="5">
                                                        {{ old('store_description') }}
                                                    </textarea>
                                                @error('store_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-check p-0">
                                                <input wire:model.defer='display_cards'
                                                    class="form-check-input  @error('display_cards') is-invalid @enderror"
                                                    type="checkbox" id="fcustomCheck1" checked="">
                                                <label class="custom-control-label" for="customCheck1">
                                                    Display cards on the cards page
                                                </label>
                                            </div>
                                            @error('display_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-check p-0">
                                                <input wire:model.defer='display_store_name'
                                                    class="form-check-input  @error('display_store_name') is-invalid @enderror"
                                                    type="checkbox" id="fcustomCheck1" checked="">
                                                <label class="custom-control-label" for="customCheck1">
                                                    Display <strong>{{ $store->store_name }}</strong> on cards
                                                </label>
                                            </div>
                                            @error('display_store_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <button type="button" class="btn btn-primary" wire:attr='disabled'
                                                wire:click='UpdateStore'>
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
